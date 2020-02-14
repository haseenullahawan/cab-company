<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanagement extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->helper('language');
        if (!$this->basic_auth->is_login())
            redirect("admin", 'refresh');
        else
            $this->data['user'] = $this->basic_auth->user();
        $this->load->model('filemanagement_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $this->load->model('calls_model');
        $this->load->model('userx_model');
        $this->load->model('notes_model');
        $this->load->model('support_model');

        $this->data['configuration'] = get_configuration();
    }

    public function index() {
        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "files";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("filemanagement");
        $this->data['title_link'] = base_url('admin/files');
        $this->data['content'] = 'admin/files/index';

        $this->data['data'] = $this->filemanagement_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function add() {
        $this->data['css_type'] = array("form");
        $this->data['active_class'] = "files";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("filemanagement");
        $this->data['title_link'] = base_url('admin/files');
        $this->data['subtitle'] = "Add";
        $this->data['content'] = 'admin/files/add';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->store();
        }
        $this->data['departments'] = $this->userx_model->departments();
        $this->data['users'] = $this->userx_model->getAll();
        

        $this->_render_page('templates/admin_template', $this->data);
    }

    public function search_user() {
//        error_reporting(E_ALL);
//        ini_set('display_errors', 1);
        
        $search = !empty($_GET['query']) ? $_GET['query'] : "";
//        $query = "SELECT GROUP_CONCAT(name_selection) FROM `vbs_filemanagement` WHERE name_selection LIKE '%$search%' ";
        $query = "SELECT selection FROM `vbs_filemanagement` WHERE selection LIKE '%$search%'";
        
        $data = $this->filemanagement_model->run_query($query);
        
        $return_data = array();
        
        foreach ($data as $key => $value) {
            $return_data[] = $value->selection;
        }

//        echo '<pre>';
//        print_r($return_data);
//        die;
//        return $return_data;
        echo json_encode($return_data);exit;
    }

    public function store() {
//        createFileManagementFilesPath();
//        $error = request_validate();
        $error = $this->filemanagement_model->validate();

//        $finename = $this->uploadJobFiles($FILES, $error);
        $filenames = $this->uploadFiles($error);

        if (empty($error)) {
            //$dob = to_unix_date(@$_POST['dob']);
            $id = $this->filemanagement_model->create([
                'file' => !empty($filenames) && count($filenames) > 0 ? $filenames[0] : "",
                'files' => json_encode($filenames),
                'added_by_firstname' => @$_POST['added_by_firstname'],
                'added_by_lastname' => @$_POST['added_by_lastname'],
                'send_date' => to_unix_date(@$_POST['send_date']),
                'send_date_hour' => @$_POST['send_date_hour'],
                'date_minute' => @$_POST['date_minute'],
                'status' => @$_POST['status'],
                'type' => @$_POST['type'],
                'name' => @$_POST['name'],
                'nature' => @$_POST['nature'],
                'priority' => @$_POST['priority'],
                'alert' => @$_POST['alert'],
                'destination' => @$_POST['destination'],
                'alert_before_day' => !empty($_POST['alert_before_day']) ? $_POST['alert_before_day'] : NULL,
//                'note' => @$_POST['note'],
                'note' => "",
                'description' => @$_POST['description'],
                'selection' => @$_POST['q'],
//                'selection' => @$_POST['selection'],
                'name_selection' => @$_POST['name_selection'],
                'date' => to_unix_date(@$_POST['date']),
                'delay_date' => to_unix_date(@$_POST['delay_date']),
                'ip_address' => $this->input->ip_address()
            ]);

            $notes = $this->notes_model->createNotesAddedByArray($id, 'files');
            if (!empty($notes)) {
                $this->notes_model->bulkInsert($notes);
            }

            $this->session->set_flashdata('alert', [
                'message' => "Successfully Created.",
                'class' => "alert-success",
                'type' => "Success"
            ]);
            redirect('admin/files');
        } else {
            $this->data['alert'] = [
                'message' => @$error[0],
                'class' => "alert-danger",
                'type' => "Error"
            ];
        }
    }

    public function uploadJobFiles($FILES, &$error) {

        $this->load->library('upload');
        $finename = '';
        if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) {
            $config['upload_path'] = './uploads/files/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240';
            $finename = $config['file_name'] = str_replace(' ', '_', time() . $_FILES['files']['name']);

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $error[] = $this->upload->display_errors();
            } else {
                $file = $this->upload->data();
                $file['upload_path'] = 'uploads/files/' . $file['file_name'];
            }
        }
        return $finename;
    }

    public function uploadFiles(&$error) {
        $this->load->library('upload');

        $files = $_FILES;

        $fileNames = [];
        $cpt = count($_FILES['files']['name']);
        for ($i = 0; $i < $cpt; $i++) {

//            $finename = $_FILES['file']['name'] = rand()."_".time() . '_' . $files['files']['name'][$i];
            $finename = $_FILES['file']['name'] = rand() . "_" . time() . '.' . pathinfo($files['files']['name'][$i], PATHINFO_EXTENSION);
//            echo $finename;die;
            $_FILES['file']['type'] = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $files['files']['error'][$i];
            $_FILES['file']['size'] = $files['files']['size'][$i];

            $this->upload->initialize($this->set_upload_options());

            if (!$this->upload->do_upload('file')) {
                $error[] = $this->upload->display_errors();
            } else {
                $fileNames[] = $finename;
            }
        }
        return $fileNames;
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function delete($id) {
        $this->filemanagement_model->delete($id);
        $this->session->set_flashdata('alert', [
            'message' => "Successfully deleted.",
            'class' => "alert-success",
            'type' => "Success"
        ]);
        redirect('admin/files');
    }

}
