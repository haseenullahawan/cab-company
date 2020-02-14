<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller

{
	function __construct()
	{
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
			
			$this->load->model('request_model');
			$this->load->model('jobs_model');
			$this->load->model('support_model');
			$this->load->model('calls_model');

		$this->data['configuration'] = get_configuration();
		
	}


	public function index(){
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "dashboard";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= $this->lang->line('dashboard');
		$this->data['content'] 		= 'admin/dashboard';
        
		//$this->load->model('calls_model');
		//$this->load->model('request_model');
		//$this->load->model('jobs_model');
		//$this->load->model('support_model');


		$data = [];
		$data['request'] = $this->request_model->getAll();
		$data['jobs'] 	 = $this->jobs_model->getAll();
		$data['calls']   = $this->calls_model->getAll();
		$data['support']   = $this->support_model->getAll();
//        for bar chart Qoute Request
        $record = $this->request_model->QouteChartCount();

        foreach($record as $row1) {
            $data1['label'][] = $row1->month_name;
            $data1['data'][] = (int) $row1->count;
        }
        $this->data['chart_data'] = json_encode($data1);
//print_r( $record);
//        for bar chart Calls request
        $CallRecord = $this->calls_model->CallChartCount();
        foreach($CallRecord as $row2) {
            $data2['label'][] = $row2->month_name;
            $data2['data'][] = (int) $row2->count;
        }
        $this->data['call_chart_data'] = json_encode($data2);

//        for bar chart Job request
        $JobsRecord = $this->jobs_model->JobsChartCount();
        foreach($JobsRecord as $row3) {
            $data3['label'][] = $row3->month_name;
            $data3['data'][] = (int) $row3->count;
        }
        $this->data['jobs_chart_data'] = json_encode($data3);
		
//        for bar chart Support request
        $SupportRecord = $this->support_model->SupportChartCount();
        foreach($SupportRecord as $row3) {
            $data31['label'][] = $row3->month_name;
            $data31['data'][] = (int) $row3->count;
        }
        $this->data['support_chart_data'] = json_encode($data31);

        //        for line chart Qoute request
        $QouteLine = $this->request_model->QouteLineChart();
//        print_r($QouteLine);
            foreach ($QouteLine as $line){
                $data4['day'][] = $line->y;
                $data4['count'][] = $line->a;
            }
        $this->data['qoute_line_data'] = json_encode($data4);
//                for line chart calls
        $QouteLine = $this->calls_model->CallsLineChart();

//        print_r($QouteLine);
        foreach ($QouteLine as $line){
            $data5['day'][] = $line->y;
            $data5['count'][] = $line->a;
        }
        $this->data['calls_line_data'] = json_encode($data5);

//        for line chart jobs
        $QouteLine = $this->jobs_model->JobsLineChart();
//        print_r($QouteLine);
        foreach ($QouteLine as $line){
            $data6['day'][] = $line->y;
            $data6['count'][] = $line->a;
        }
        $this->data['jobs_line_data'] = json_encode($data6);
		
//        for line chart Support
        $QouteLine = $this->support_model->SupportLineChart();
//        print_r($QouteLine);
        foreach ($QouteLine as $line){
            $data61['day'][] = $line->y;
            $data61['count'][] = $line->a;
        }
        $this->data['support_line_data'] = json_encode($data61);
		
		foreach($data as $key => $d){
			if($d != false){
				foreach($d as $i){
					if(!empty($i->status))
						$this->data[$key][strtolower($i->status)] = isset($this->data[$key][strtolower($i->status)]) ? $this->data[$key][strtolower($i->status)] + 1 : 1;
				}
			}
		}
        
        $this->_render_page('templates/admin_template', $this->data);
        
	}

	public function logout(){
		$this->basic_auth->logout();
		redirect("admin", 'refresh');
	}
}