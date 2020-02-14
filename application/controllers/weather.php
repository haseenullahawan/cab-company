<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends MY_Controller {

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
        $this->load->model('weather_model');
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
        $this->data['active_class'] = "weather";
        $this->data['gmaps'] = false;
        $this->data['title'] = 'Weather';
        $this->data['title_link'] = base_url('admin/weather.php');
        $this->data['content'] = 'admin/weather';

        $where = array();

        $this->data['data'] = $this->weather_model->get();
        $this->_render_page('templates/admin_template', $this->data);
    }
    
    public function update($id) {
        $data = array(
            'showDiscription' => $_POST['showDiscription'],    
            'showRegion' => $_POST['showRegion'],    
            'showCountry' => $_POST['showCountry'],    
            'showDetails' => $_POST['showDetails'],    
            'location' => $_POST['location'],    
            'forecasts' => $_POST['forecasts'],    
            'nbForecastDays' => $_POST['nbForecastDays']    
        );
        $this->weather_model->update($data, $id);
        $this->index();
    }

}
