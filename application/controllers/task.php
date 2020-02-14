<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends MY_Controller {

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
        $this->load->model('task_model');
        $this->load->model('userx_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $this->load->model('calls_model');
        $this->load->model('notes_model');
		$this->load->model('support_model');

        $this->data['configuration'] = get_configuration();
    }

    public function index() {

        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "tasks";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("task");
        $this->data['title_link'] = base_url('admin/tasks.php');
        $this->data['content'] = 'admin/task/index';

        $where = array();
        if (!empty($this->data['user']) && empty($this->data['user']->role)) {
            $where['vbs_task.affected_user'] = $this->data['user']->id;
            $where['task.affected_user'] = $this->data['user']->id;
        }

        $this->data['data'] = $this->task_model->getAll($where);
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function add() {
        $this->data['css_type'] = array("form");
        $this->data['active_class'] = "task";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("task");
        $this->data['title_link'] = base_url('admin/tasks.php');
        $this->data['subtitle'] = "Add";
        $this->data['content'] = 'admin/task/add';
        $this->data['departments'] = $this->userx_model->departments();
        $this->data['users'] = $this->userx_model->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->store();
        }
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function store() {

//        $error = request_validate();
        $error = $this->task_model->validate();

        $filenames = $this->uploadFiles($error);
        
//        echo '<pre>';
//        print_r($error);die;

        if (empty($error)) {
            
//            echo 'come';die;
            //$dob = to_unix_date(@$_POST['dob']);
            $id = $this->task_model->create([
                'date_hour' => @$_POST['date_hour'],
                'date_minute' => @$_POST['date_minute'],
                'status' => @$_POST['status'],
                'added_by_firstname' => @$_POST['added_by_firstname'],
                'added_by_lastname' => @$_POST['added_by_lastname'],
                'affected_department' => @$_POST['affected_department'],
                'affected_user' => @$_POST['affected_user'],
                'priority' => @$_POST['priority'],
                'date2_hour' => @$_POST['date2_hour'],
                'date2_minute' => @$_POST['date2_minute'],
                'note' => @$_POST['note'],
//                'note2' => @$_POST['note2'],
                'note2' => "",
                'files' => json_encode($filenames),
                'date' => to_unix_date(@$_POST['date']),
                'date2' => to_unix_date(@$_POST['date2']),
                'ip_address' => $this->input->ip_address()
            ]);

            $this->session->set_flashdata('alert', [
                'message' => "Successfully Created.",
                'class' => "alert-success",
                'type' => "Success"
            ]);
            redirect('admin/tasks/' . $id . '/edit');
        } else {
            $this->data['alert'] = [
                'message' => @$error[0],
                'class' => "alert-danger",
                'type' => "Error"
            ];
        }
    }

    public function edit($id) {

        $this->data['data'] = $this->task_model->get(['id' => $id]);
        if ($this->data['data'] != false) {
            $this->data['css_type'] = array("form");
            $this->data['active_class'] = "task";
            $this->data['gmaps'] = false;
            $this->data['title'] = $this->lang->line("task");
            $this->data['title_link'] = base_url('admin/tasks.php');
            $this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_at, $id);
            $this->data['content'] = 'admin/task/edit';

            $this->data['departments'] = $this->userx_model->departments();
            $department_info = $this->userx_model->getDepartment($this->data['data']->affected_department);
            $this->data['data']->affected_department_name = $department_info->name;
            $this->data['users'] = $this->userx_model->getAll();
            $this->data['notes'] = $this->notes_model->getAll(['type' => 'tasks','type_id' => $id]);
            
            $this->_render_page('templates/admin_template', $this->data);
        } else
            show_404();
    }

    public function update($id) {
        $request = $this->task_model->get(['id' => $id]);

//        echo "<pre>";
//        print_r(to_unix_date(@$_POST['send_date']));
//        die();
        $error = $this->task_model->validate();
//    echo '<pre>';
//        print_r($error);die;
        $filenames = $this->uploadFiles($error);
        if ($request != false) {
            //$error = request_validate();
            if (empty($error)) {
                
                //$dob = to_unix_date(@$_POST['dob']);
                $this->task_model->update([
                    'date_hour' => @$_POST['date_hour'],
                    'date_minute' => @$_POST['date_minute'],
                    'status' => @$_POST['status'],
                    'added_by_firstname' => @$_POST['added_by_firstname'],
                    'added_by_lastname' => @$_POST['added_by_lastname'],
                    'affected_department' => @$_POST['affected_department'],
                    'affected_user' => @$_POST['affected_user'],
                    'priority' => @$_POST['priority'],
                    'date2_hour' => @$_POST['date2_hour'],
                    'date2_minute' => @$_POST['date2_minute'],
                    'note' => @$_POST['note'],
//                    'note2' => @$_POST['note2'],
                    'files' => json_encode($filenames),
                    'date' => to_unix_date(@$_POST['date']),
                    'date2' => to_unix_date(@$_POST['date2']),
                    'ip_address' => $this->input->ip_address()
                        ], $id);
                
                $this->notes_model->delete(['type' => 'tasks', 'type_id' => $id]);
                $notes = $this->notes_model->createNotesAddedByArray($id, 'tasks');
                
//                echo '<pre>';
//        print_r($notes);die;
        
                if(!empty($notes)) $this->notes_model->bulkInsert($notes);

                $this->session->set_flashdata('alert', [
                    'message' => "Successfully Updated.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
            } else {

                $this->session->set_flashdata('alert', [
                    'message' => @$error[0],
                    'class' => "alert-danger",
                    'type' => "Error"
                ]);
            }
            redirect('admin/tasks/' . $id . '/edit');
        } else
            show_404();
    }

    public function reply($id) {
        $call = $this->task_model->get(['id' => $id]);
        if ($call != false) {
            $this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
            $this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');
            if ($this->form_validation->run() !== false) {

                $subject = isset($_POST['reply_subject']) ? $_POST['reply_subject'] : '';
                $message = isset($_POST['reply_message']) ? $_POST['reply_message'] : '';
                $check = sendReply($call, $subject, $message);

                if ($check['status'] != false) {
                    $this->task_model->update(['last_action' => date('Y-m-d H:i:s')], $id);
                    $this->session->set_flashdata('alert', [
                        'message' => "Successfully Reply Sent.",
                        'class' => "alert-success",
                        'type' => "Success"
                    ]);
                } else
                    $this->session->set_flashdata('alert', [
                        'message' => $check['message'],
                        'class' => "alert-danger",
                        'type' => "Danger"
                    ]);
            } else {
                $validator['messages'] = "";
                foreach ($_POST as $key => $inp) {
                    if (form_error($key) != false) {
                        $this->session->set_flashdata('alert', [
                            'message' => form_error($key, "<span>", "</span>"),
                            'class' => "alert-danger",
                            'type' => "Danger"
                        ]);
                        break;
                    }
                }
            }

            redirect('admin/tasks/' . $id . '/edit');
        } else
            show_404();
    }

    public function delete($id) {
        $this->task_model->delete($id);
        $this->session->set_flashdata('alert', [
            'message' => "Successfully deleted.",
            'class' => "alert-success",
            'type' => "Success"
        ]);
        redirect('admin/task');
    }

    public function uploadFiles1(&$error) {

        $this->load->library('upload');
        $finename = '';

        if (isset($_FILES['files']) && count($_FILES['files']) > 0) {
            foreach ($_FILES['files'] as $key => $file) {
                if (isset($file) && !empty($file)) {
                    $config['upload_path'] = './uploads/task/';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = '10240';
                    $finename = $config['file_name'] = str_replace(' ', '_', time() . $_FILES['file']['name']);

                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file')) {
                        $error[] = $this->upload->display_errors();
                    } else {
                        $file = $this->upload->data();
                        $file['upload_path'] = 'uploads/task/' . $file['file_name'];
                    }
                }
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
            
            $finename = $_FILES['file']['name'] = rand()."_".time() . '_' . $files['files']['name'][$i];
//            $finename = $_FILES['file']['name'] = rand()."_".time() . '.' . pathinfo($files['files']['name'][$i],PATHINFO_EXTENSION);
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
        $config['upload_path'] = './uploads/task/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

}
