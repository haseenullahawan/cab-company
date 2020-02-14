<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class clients extends MY_Controller

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
        $this->load->model('invoice_model');
		$this->load->model('request_model');
		$this->load->model('jobs_model');
		$this->load->model('support_model');
		$this->load->model('calls_model');
        $this->load->model('notes_model');
        $this->load->model('notifications_model');
        $this->load->model('cars_model');

        $this->data['configuration'] = get_configuration();
    }

   public function index()
    {
        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "clients";
        $this->data['gmaps'] = false;
        $this->data['title'] = 'Clients';
        $this->data['title_link'] = base_url('admin/clients');
        $this->data['content'] = 'admin/clients/index';

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] = $this->jobs_model->getAll();
        $data['calls'] = $this->calls_model->getAll();

        $this->data['data'] = $this->request_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function configurations(){
        $this->data['css_type'] 	= array("form","datatable");
        $this->data['active_class'] = "Config Clients";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= $this->lang->line("configurations");
        $this->data['subtitle'] 	= 'Config Clients';
        $this->data['title_link'] 	= '#';
        $this->data['content'] 		= 'admin/clients/configurations';
        $data = [];
        $this->data['data'] = $this->notifications_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }

    public function addclienttypeproccess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'type' => $type,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


       // print_r($values);

      $insert = $this->cars_model->insertData('vbs_clientType',$values,'type',$type);

       if($insert == 1){
           echo "success";
       }
    }

     public function addclientpaymentproccess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'payment' => $payment,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


       // print_r($values);

      $insert = $this->cars_model->insertData('vbs_clientPayment',$values,'payment',$payment);

       if($insert == 1){
           echo "success";
       }
    }

         public function addclientdelayproccess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'delay' => $delay,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


       // print_r($values);

      $insert = $this->cars_model->insertData('vbs_clientDelay',$values,'delay',$delay);

       if($insert == 1){
           echo "success";
       }
    }


   
    public function getclienttypeproccess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_clientType','is_delete','1',$name,$from,$to,'type');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="check" class="TypeClass"  id="TypeCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_type" value="'.$stat->type.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->type.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

        public function getclientpaymentproccess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_clientPayment','is_delete','1',$name,$from,$to,'payment');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="check" class="PaymentClass"  id="PaymentCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_payment" value="'.$stat->payment.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->payment.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

          public function getclientdelayproccess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_clientDelay','is_delete','1',$name,$from,$to,'delay');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="check" class="DelayClass"  id="DelayCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_delay" value="'.$stat->delay.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->delay.'</td>
                 <td align="center">'.$stat->create_date.'</td>
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }

   

    public function updateclienttypeproccess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'type' => $type
        ];
        $update = $this->cars_model->updateStatut($id,$type,$values,'vbs_clientType','type');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

    public function updateclientpaymentproccess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'payment' => $payment
        ];
        $update = $this->cars_model->updateStatut($id,$payment,$values,'vbs_clientPayment','payment');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

     public function updateclientdelayproccess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'delay' => $delay
        ];
        $update = $this->cars_model->updateStatut($id,$delay,$values,'vbs_clientDelay','delay');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

  

     public function deleteclienttypeproccess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_clientType');
        if($update == 1){
            echo "success";
        }
    }

     public function deleteclientpaymentproccess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_clientPayment');
        if($update == 1){
            echo "success";
        }
    }

     public function deleteclientdelayproccess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_clientDelay');
        if($update == 1){
            echo "success";
        }
    }
}
