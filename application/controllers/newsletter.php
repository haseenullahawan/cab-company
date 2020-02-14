<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->helper('language');
        // Load Custom Model
        $this->load->model('my_model');
        $this->load->model('language_model');
        $this->load->model('smtp_model');
        $this->lang->load('auth');
        $this->load->helper('language');
        if (!$this->basic_auth->is_login()) {
            redirect("admin", 'refresh');
        } else {
            $this->data['user'] = $this->basic_auth->user();
        }
        $this->load->model('newsletter_model');
        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
		$this->load->model('support_model');
		

        $this->data['configuration'] = get_configuration();
    }

    public function index() {
        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "newsletters";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("newsletter");
        $this->data['title_link'] = base_url('admin/newsletters');
        $this->data['content'] = 'admin/newsletter/index';

        $data = [];

        $this->data['data'] = $this->newsletter_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function add() {
        $this->data['css_type'] = array("form");
        $this->data['active_class'] = "newsletters";
        $this->data['gmaps'] = false;
        $this->data['title'] = $this->lang->line("newsletter");
        $this->data['title_link'] = base_url('admin/newsletters');
        $this->data['subtitle'] = "Add";
        $this->data['content'] = 'admin/newsletter/add';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->store();
        }
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function store() {
//        $error = request_validate();
        $error = $this->newsletter_model->validate();

        if (empty($error)) {
            //$dob = to_unix_date(@$_POST['dob']);
            $id = $this->newsletter_model->create([
                'status' => @$_POST['status'],
                'user_type' => @$_POST['user_type'],
                'category' => @$_POST['category'],
                'user_status' => @$_POST['user_status'],
                'subject' => @$_POST['subject'],
                'description' => @htmlentities($_POST['description']),
                'send_date' => to_unix_date(@$_POST['send_date']),
//                'send_date'=> @$_POST['send_date'],
                //'dob' 			=> @$dob,
                'send_date_hour' => @$_POST['send_date_hour'],
                'send_date_minute' => @$_POST['send_date_minute'],
                'ip_address' => $this->input->ip_address()
            ]);

            $this->session->set_flashdata('alert', [
                'message' => "Successfully Created.",
                'class' => "alert-success",
                'type' => "Success"
            ]);
            redirect('admin/newsletters/' . $id . '/edit');
        } else {
            $this->data['alert'] = [
                'message' => @$error[0],
                'class' => "alert-danger",
                'type' => "Error"
            ];
        }
    }

    public function edit($id) {
        $this->data['data'] = $this->newsletter_model->get(['id' => $id]);
        if ($this->data['data'] != false) {
            $this->data['css_type'] = array("form");
            $this->data['active_class'] = "newsletters";
            $this->data['gmaps'] = false;
            $this->data['title'] = $this->lang->line("newsletter");
            $this->data['title_link'] = base_url('admin/newsletters');
            $this->data['subtitle'] = create_timestamp_uid($this->data['data']->created_at, $id);
            $this->data['content'] = 'admin/newsletter/edit';

            $this->_render_page('templates/admin_template', $this->data);
        } else {
            show_404();
        }
    }

    public function update($id) {
        $request = $this->newsletter_model->get(['id' => $id]);

        if ($request != false) {
            //$error = request_validate();

            $today = date('Y-m-d');


            if (isset($_POST['send_date'])) {

                $form_date = strtotime(str_replace('/', '-', $_POST['send_date'])) . "<br />";
                $form_date = date("Y-m-d", $form_date);

                if ($form_date <= $today) {

                    $this->session->set_flashdata('alert', [
                        'message' => 'Please select future date',
                        'class' => "alert-danger",
                        'type' => "Error"
                    ]);
                    redirect('admin/newsletters/' . $id . '/edit');
                }
            } else {

                $_POST['send_date'] = '';
                $_POST['send_date_hour'] = '';
            }



            if (empty($error)) {
                //$dob = to_unix_date(@$_POST['dob']);
                $this->newsletter_model->update([
                    'email' => @$_POST['email'],
                    'shedule' => @$_POST['type'],
                    'status' => @$_POST['status'],
                    'user_type' => @$_POST['user_type'],
                    'category' => @$_POST['category'],
                    'user_status' => @$_POST['user_status'],
                    'subject' => @$_POST['subject'],
                    'description' => @htmlentities($_POST['description']),
                    'send_date' => to_unix_date(@$_POST['send_date']),
                    //'dob' 			=> @$dob,
//                    'send_date'=> @$_POST['send_date'],
                    'send_date_hour' => @$_POST['send_date_hour'],
                    'send_date_minute' => @$_POST['send_date_minute'],
                        ], $id);

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
            redirect('admin/newsletters/' . $id . '/edit');
        } else
            show_404();
    }

    public function reply($id) {
        $call = $this->newsletter_model->get(['id' => $id]);
        if (true) {
            /*$this->form_validation->set_rules('reply_subject', 'Subject', 'trim|xss_clean|min_length[0]|max_length[200]');
            $this->form_validation->set_rules('reply_message', 'Message', 'trim|xss_clean|min_length[0]|max_length[5000]');*/
            if (true) {

                $subject = 'Test Newsletter';
                $message = 'Test';
                $MAIL = $this->smtp_model->get(array('id' => 1));
				$check = sendReply($call,$subject,$message,"",$MAIL,array(),array(@$_POST['email']));

                if ($check['status'] != false) {
                    $this->newsletter_model->update(['last_action' => date('Y-m-d H:i:s')], $id);
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

            redirect('admin/newsletters/' . $id . '/edit');
        } else
            show_404();
    }

    public function delete($id) {
        $this->newsletter_model->delete($id);
        $this->session->set_flashdata('alert', [
            'message' => "Successfully deleted.",
            'class' => "alert-success",
            'type' => "Success"
        ]);
        redirect('admin/newsletter');
    }

}
