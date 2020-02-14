<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rectruitement_config extends MY_Controller {

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
		  $this->load->model('sitemodel');
	}


	public function index(){
        
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "Recurimentconfig";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= 'Rectruitement configurations';
		$this->data['content'] 		= 'admin/Recurimentconfig';
        $this->data['getjob'] = $this->sitemodel->getJob();
        $this->data['job_hourspermonth'] = $this->sitemodel->getConfig('job_hourspermonth');
		$this->data['job_job'] = $this->sitemodel->getConfig('job_job');
		$this->data['job_jobcategory'] = $this->sitemodel->getConfig('job_jobcategory');
		$this->data['job_natureofcontract'] = $this->sitemodel->getConfig('job_natureofcontract');
		$this->data['job_requireddiploma'] = $this->sitemodel->getConfig('job_requireddiploma');
		$this->data['job_requireddocument'] = $this->sitemodel->getConfig('job_requireddocument');
		$this->data['job_requiredexperiance'] = $this->sitemodel->getConfig('job_requiredexperiance');
		$this->data['job_typeofcontract'] = $this->sitemodel->getConfig('job_typeofcontract');
		$this->data['job_workingplace'] = $this->sitemodel->getConfig('job_workingplace');
		$this->data['job_statut'] = $this->sitemodel->getConfig('job_statut');
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
	public function add_jobs(){
        
		$this->data['css_type'] 	= array("form","datatable");
		$this->data['active_class'] = "Recurimentconfig";
		$this->data['gmaps'] 		= false;
		$this->data['title'] 		= 'Rectruitement Add Job';
		$this->data['content'] 		= 'admin/jobs_page';
        $this->data['getjob'] = $this->sitemodel->getJob();
        $this->data['job_hourspermonth'] = $this->sitemodel->getConfig('job_hourspermonth');
		$this->data['job_job'] = $this->sitemodel->getConfig('job_job');
		$this->data['job_jobcategory'] = $this->sitemodel->getConfig('job_jobcategory');
		$this->data['job_natureofcontract'] = $this->sitemodel->getConfig('job_natureofcontract');
		$this->data['job_requireddiploma'] = $this->sitemodel->getConfig('job_requireddiploma');
		$this->data['job_requireddocument'] = $this->sitemodel->getConfig('job_requireddocument');
		$this->data['job_requiredexperiance'] = $this->sitemodel->getConfig('job_requiredexperiance');
		$this->data['job_typeofcontract'] = $this->sitemodel->getConfig('job_typeofcontract');
		$this->data['job_workingplace'] = $this->sitemodel->getConfig('job_workingplace');
		$this->data['job_statut'] = $this->sitemodel->getConfig('job_statut');
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
	function ConfigPost()
	{
		$array = array($this->input->post('fieldname') => $this->input->post('fieldvalue'),
			'create_date' => date('Y-m-d H:i:s') );
		$this->db->insert($this->input->post('tablename'),$array);
		$json['success'] = true;
	$this->output->set_output(json_encode($json));
	}
	function ConfigUpdate()
	{
		$array = array($this->input->post('fieldname') => $this->input->post('fieldvalue'));
		$this->db->where('id',$this->input->post('id'));
		$this->db->update($this->input->post('tablename'),$array);
		$json['success'] = true;
		$this->output->set_output(json_encode($json));
	}
		function ConfigDelete()
	{
		$this->db->where('id',$this->input->post('id'));
		$this->db->delete($this->input->post('tablename'));
		$json['success'] = true;
		$this->output->set_output(json_encode($json));
	}
	
	function SaveJob()
	{
	
		
		if(!empty($_FILES["fileToUpload"]["name"]))
		{
			$target_dir = "uploads/job/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$postfilename = date('Y-m-d H-i-s') . '-' . $_FILES["fileToUpload"]["name"];
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $postfilename);
			$fileName = $target_dir.$postfilename;
		}
		else
		{
			$postfilename = '';
		}
		
		$array =  array(
			'status_id' => $this->input->post('status_id'),
			'published_date' => $this->input->post('published_date'),
			'published_time' => $this->input->post('published_time'),
			'to_date' => !empty($this->input->post('to_date'))?$this->input->post('to_date'):'',
			'to_time' => !empty($this->input->post('to_time'))?$this->input->post('to_time'):'',
			'typeofcontract_id' => $this->input->post('typeofcontract_id'),
			'hourspermonth_id' => $this->input->post('hourspermonth_id'),
			'job_id' => $this->input->post('job_id'),
			'natureofcontract_id' => $this->input->post('natureofcontract_id'),
			'workingplace_id' => $this->input->post('workingplace_id'),
			'requiredexperiance_id' => $this->input->post('requiredexperiance_id'),
			'requireddiploma_id' => implode(",", $this->input->post('requireddiploma_id')),
			'requireddocument_id' => implode(",", $this->input->post('requireddocument_id')),
			'jobcategory_id' => $this->input->post('jobcategory_id'),
			'job_title' => $this->input->post('job_title'),
				'brut_salary' => $this->input->post('brut_salary'),
			'picture' => $postfilename,
			'description' => $this->input->post('description'),
			'created_date' => date('Y-m-d H:i:s')
		);
		
		$this->db->insert('vbs_job',$array);
		$json['success'] = true;
		echo json_encode($json);
		
	}
		
	function UpdateSaveJob()
	{
		if(!empty($_FILES["fileToUpload"]["name"]))
		{
			$target_dir = "uploads/job/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$postfilename = date('Y-m-d H-i-s') . '-' . $_FILES["fileToUpload"]["name"];
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $postfilename);
			$fileName = $target_dir.$postfilename;
		}
		else
		{
			$postfilename = $this->input->post('old_file_name');
		}
		
		$array =  array(
			'status_id' => $this->input->post('status_id'),
			'published_date' => $this->input->post('published_date'),
			'published_time' => $this->input->post('published_time'),
			'to_date' => !empty($this->input->post('to_date'))?$this->input->post('to_date'):'',
			'to_time' => !empty($this->input->post('to_time'))?$this->input->post('to_time'):'',
			'typeofcontract_id' => $this->input->post('typeofcontract_id'),
			'hourspermonth_id' => $this->input->post('hourspermonth_id'),
			'job_id' => $this->input->post('job_id'),
			'natureofcontract_id' => $this->input->post('natureofcontract_id'),
			'workingplace_id' => $this->input->post('workingplace_id'),
			'requiredexperiance_id' => $this->input->post('requiredexperiance_id'),
			'requireddiploma_id' => implode(",", $this->input->post('requireddiploma_id')),
			'requireddocument_id' => implode(",", $this->input->post('requireddocument_id')),
			'jobcategory_id' => $this->input->post('jobcategory_id'),
			'brut_salary' => $this->input->post('brut_salary'),
			'job_title' => $this->input->post('job_title'),
			'picture' => $postfilename,
			'description' => $this->input->post('description'),
		
		);
		
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('vbs_job',$array);
//		$json['success'] = true;
//		echo json_encode($json);
		redirect('admin/add_jobs');
	}
	
	
	
}