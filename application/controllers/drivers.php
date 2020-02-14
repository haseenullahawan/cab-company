<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Drivers extends MY_Controller

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
        $this->data['active_class'] = "drivers";
        $this->data['gmaps'] = false;
        $this->data['title'] = 'Drivers';
        $this->data['title_link'] = base_url('admin/drivers');
        $this->data['content'] = 'admin/drivers/index';

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data = [];
        $data['request'] = $this->request_model->getAll();
        $data['jobs'] = $this->jobs_model->getAll();
        $data['calls'] = $this->calls_model->getAll();
        // var_dump("i am here");
        
        // var_dump($_POST);
        $this->data['data'] = $this->request_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }
    public function adddata()
    {
        $this->data['css_type'] = array("form", "datatable");
        $this->data['active_class'] = "drivers";
        $this->data['gmaps'] = false;
        $this->data['title'] = 'Drivers';
        $this->data['title_link'] = base_url('admin/drivers');
        $this->data['content'] = 'admin/drivers/index';

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
        $this->data['active_class'] = "Config Drivers";
        $this->data['gmaps'] 		= false;
        $this->data['title'] 		= $this->lang->line("configurations");
        $this->data['subtitle'] 	= 'Config Drivers';
        $this->data['title_link'] 	= '#';
        $this->data['content'] 		= 'admin/drivers/configurations';
        $data = [];
        $this->data['data'] = $this->notifications_model->getAll();
        $this->_render_page('templates/admin_template', $this->data);
    }



    public function getcaraddedprocess(){
        extract($_GET);
        $caradds = $this->cars_model->getdata('carsadded');
        $tbody = '';
        if(!empty($caradds)){
            $i = 1;
            foreach ($caradds as $cars){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="check" class="StautClass"  id="check" value="'.$stat->id.'" >
                 <input type="hidden" id="update_statut" value="'.$stat->statut.'">
                 </td>
                 <td align="center">'.$i.'</td>
              
                </tr>
                ';
                $i++;
            }
        }else{
            $tbody .= '<tr align="center"><td colspan="4"><span class="text-danger text-center">No Record Found</span></td></tr>';
        }

        echo $tbody;
    }









   /*configuratios are statring from here*/
    public function addstatusprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'statut' => $statut,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


       // print_r($values);

      $insert = $this->cars_model->insertData('vbs_carStatut',$values,'statut',$statut);

       if($insert == 1){
           echo "success";
       }
    }

    public function addciviliteprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'civilite' => $civilite,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCivilite',$values,'civilite',$civilite);

        if($insert == 1){
            echo "success";
        }
    }
    public function addpostprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'marque' => $post,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carMarque',$values,'marque',$post);

        if($insert == 1){
            echo "success";
        }
    }
    public function addpatternprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'modele' => $pattern,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carModele',$values,'modele',$pattern);

        if($insert == 1){
            echo "success";
        }
    }
    public function addageprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'age' => $age,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carAge',$values,'age',$age);

        if($insert == 1){
            echo "success";
        }
    }
    public function addseriesprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'serie' => $series,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carSerie',$values,'serie',$series);

        if($insert == 1){
            echo "success";
        }
    }

      public function addboiteprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'boite' => $boite,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carBoite',$values,'boite',$boite);

        if($insert == 1){
            echo "success";
        }
    }

          public function addfuelprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'carburant' => $fuel,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCarburant',$values,'carburant',$fuel);

        if($insert == 1){
            echo "success";
        }
    }

        public function addmailprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'courroie' => $mail,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCourroie',$values,'courroie',$mail);

        if($insert == 1){
            echo "success";
        }
    }

      public function addcolorprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'couleur' => $color,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carCouleur',$values,'couleur',$color);

        if($insert == 1){
            echo "success";
        }
    }

       public function addnatureprocess(){
        extract($_GET);
        //print_r($_GET);
        //die();
        $values = [
            'nature' => $nature,
            'is_delete' => 1,
            'create_date' => date("Y-m-d H:i:s")
        ];


        // print_r($values);

        $insert = $this->cars_model->insertData('vbs_carNature',$values,'nature',$nature);

        if($insert == 1){
            echo "success";
        }
    }

    public function getstatusprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carStatut','is_delete','1',$name,$from,$to,'statut');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="check" class="StautClass"  id="check" value="'.$stat->id.'" >
	             <input type="hidden" id="update_statut" value="'.$stat->statut.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->statut.'</td>
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

    public function getcivilityprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCivilite','is_delete','1',$name,$from,$to,'civilite');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="CivilityCheck" class="CivilityClass"  id="CivilityCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_civility" value="'.$stat->civilite.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->civilite.'</td>
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

    public function getpostprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carMarque','is_delete','1',$name,$from,$to,'marque');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="PostCheck" class="PostClass"  id="postCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_post" value="'.$stat->marque.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->marque.'</td>
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
    public function getpatternprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carModele','is_delete','1',$name,$from,$to,'modele');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="PatternCheck" class="PatternClass"  id="PatternCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_pattern" value="'.$stat->modele.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->modele.'</td>
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
    public function getageprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carAge','is_delete','1',$name,$from,$to,'age');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="AgeCheck" class="AgeClass"  id="AgeCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_age" value="'.$stat->age.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->age.'</td>
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
    public function getseriesprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carSerie','is_delete','1',$name,$from,$to,'serie');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
	             <input type="checkbox" name="SeriesCheck" class="SeriesClass"  id="SeriesCheck" value="'.$stat->id.'" >
	             <input type="hidden" id="update_series" value="'.$stat->serie.'">
	             </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->serie.'</td>
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

        public function getboiteprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carBoite','is_delete','1',$name,$from,$to,'boite');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="BoiteCheck" class="BoiteClass"  id="BoiteCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_boite" value="'.$stat->boite.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->boite.'</td>
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

       public function getfuelprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCarburant','is_delete','1',$name,$from,$to,'carburant');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="FuelCheck" class="FuelClass"  id="FuelCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_fuel" value="'.$stat->carburant.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->carburant.'</td>
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

         public function getmailprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCourroie','is_delete','1',$name,$from,$to,'courroie');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="MailCheck" class="MailClass"  id="MailCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_mail" value="'.$stat->courroie.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->courroie.'</td>
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

       public function getcolorprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carCouleur','is_delete','1',$name,$from,$to,'couleur');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="ColorCheck" class="ColorClass"  id="ColorCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_color" value="'.$stat->couleur.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->couleur.'</td>
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

       public function getnatureprocess(){
        extract($_GET);
        $statut = $this->cars_model->getStaut('vbs_carNature','is_delete','1',$name,$from,$to,'nature');
        $tbody = '';
        if(!empty($statut)){
            $i = 1;
            foreach ($statut as $stat){
                $tbody .= '
                <tr>
                <td align="center">
                 <input type="checkbox" name="NatureCheck" class="NatureClass"  id="NatureCheck" value="'.$stat->id.'" >
                 <input type="hidden" id="update_nature" value="'.$stat->nature.'">
                 </td>
                 <td align="center">'.$i.'</td>
                 <td align="center">'.$stat->nature.'</td>
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


    public function updatestatusprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'statut' => $statut
        ];
        $update = $this->cars_model->updateStatut($id,$statut,$values,'vbs_carStatut','statut');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

    public function updateciviliteprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'civilite' => $civilite
        ];
        $update = $this->cars_model->updateStatut($id,$civilite,$values,'vbs_carCivilite','civilite');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updatepostprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'marque' => $post
        ];
        $update = $this->cars_model->updateStatut($id,$post,$values,'vbs_carMarque','marque');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updatepatternprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'modele' => $pattern
        ];
        $update = $this->cars_model->updateStatut($id,$pattern,$values,'vbs_carModele','modele');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updateageprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'age' => $age
        ];
        $update = $this->cars_model->updateStatut($id,$age,$values,'vbs_carAge','age');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }
    public function updateseriesprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'serie' => $series
        ];
        $update = $this->cars_model->updateStatut($id,$series,$values,'vbs_carSerie','serie');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

        public function updateboiteprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'boite' => $boite
        ];
        $update = $this->cars_model->updateStatut($id,$boite,$values,'vbs_carBoite','boite');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }


       public function updatefuelprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'carburant' => $fuel
        ];
        $update = $this->cars_model->updateStatut($id,$fuel,$values,'vbs_carCarburant','carburant');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

        public function updatemailprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'courroie' => $mail
        ];
        $update = $this->cars_model->updateStatut($id,$mail,$values,'vbs_carCourroie','courroie');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

       public function updatecolorprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'couleur' => $color
        ];
        $update = $this->cars_model->updateStatut($id,$color,$values,'vbs_carCouleur','couleur');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

       public function updatenatureprocess(){
        extract($_GET);

        /*print_r($_GET);
        die();*/
        $values = [
            'nature' => $nature
        ];
        $update = $this->cars_model->updateStatut($id,$nature,$values,'vbs_carNature','nature');

        if($update == 1){
            echo "success";
        }else{
            echo "failed";
        }

    }

    public function deletestatusprocess(){
        extract($_GET);

      //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carStatut');
       if($update == 1){
           echo "success";
       }
    }

    public function deleteciviliteprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCivilite');
        if($update == 1){
            echo "success";
        }
    }
    public function deletepostprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carMarque');
        if($update == 1){
            echo "success";
        }
    }

    public function deletepatternprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carModele');
        if($update == 1){
            echo "success";
        }
    }
    public function deleteageprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carAge');
        if($update == 1){
            echo "success";
        }
    }
    public function deleteseriesprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carSerie');
        if($update == 1){
            echo "success";
        }
    }

        public function deleteboiteprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carBoite');
        if($update == 1){
            echo "success";
        }
    }

       public function deletefuelprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCarburant');
        if($update == 1){
            echo "success";
        }
    }

      public function deletemailprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCourroie');
        if($update == 1){
            echo "success";
        }
    }

     public function deletecolorprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carCouleur');
        if($update == 1){
            echo "success";
        }
    }

     public function deletenatureprocess(){
        extract($_GET);

        //$delete =  $this->cars_model->deleteDelete('vbs_carStatut',$id);
        $values = [
            'is_delete' => '0'
        ];
        $update = $this->cars_model->deactive($values,$id,'vbs_carNature');
        if($update == 1){
            echo "success";
        }
    }
}
