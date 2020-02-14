<?php


class Language extends CI_Controller{
public function __construct()
    {
        parent::__construct();
        // load form and url helpers
        $data = [];
        $this->load->model('my_model');
        $this->load->model('language_model');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->lang->load('auth');
        $this->lang->load('general');
        $this->load->helper('language');
        $this->load->helper('validate');
        if (!$this->basic_auth->is_login())
            redirect("admin", 'refresh');
        else
            $data['user'] = $this->basic_auth->user();
        $this->load->model('bookings_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $this->load->model('support_model');
        $this->load->model('calls_model');
        $this->load->model('notes_model');
        $this->load->model('notifications_model');

        $this->data['configuration'] = get_configuration();
    }


    public function index()
    {
        $data['user'] = $this->basic_auth->user();
        $data['css_type']   = array("form","datatable");
        $data['active_class'] = "language";
        $data['gmaps']      = false;
        $data['title']      = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        
        $data['language'] = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages");
        $data['content']  = 'admin/language/index';
        $this->load->view('templates/language_template',$data);
    }

    public function edit_language($id)
    {
        
        $data['css_type']   = array("form","datatable");
        $data['active_class'] = "dashboard";
        $data['gmaps']      = false;
        $data['title']        = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $this->lang->line("edit");
        $data['user'] = $this->basic_auth->user();

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        
        
        $data['language'] = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where id = '".$id."'");
        //$this->load->view('admin/edit_language',$data);
        $data['content']  = 'admin/language/edit_language';
        $this->load->view('templates/language_template',$data);
    }


    public function add_language()
    {
        $data['css_type']   = array("form");
        $data['active_class'] = "dashboard";
        $data['gmaps']      = false;
        $data['title']        = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $this->lang->line("add");
        $data['user'] = $this->basic_auth->user();

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data['content']  = 'admin/language/add_language';
        $this->load->view('templates/language_template',$data);
        //$this->load->view('admin/language/add');
    }


    public function store_language()
    {

        $this->form_validation->set_rules('Short_code', 'Short Code', 'required|max_length[2]|min_length[2]');
        $this->form_validation->set_rules('language', 'Language Name', 'required|max_length[40]|min_length[4]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('alert', [
                    'message' => "Fill the from correctly.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ]);
            redirect('admin/language/add');
        }

        $title = $this->input->post('language');
        // $rows = $this->my_model->checkNumRows('languages',array('title'=>$title));
        // exit('abc');
        // if($rows!=0)
        // {
        //     //$this->session->set_flashdata('errormsg','languages Name is already Exist Please try another.');
        //     $this->session->set_flashdata('alert', [
        //             'message' => "languages Name is already Exist Please try another.",
        //             'class' => "alert-danger",
        //             'type' => "Error"
        //         ]);
        //     redirect('language/add_language');
        // }
        $file_name = '';
        if (isset($_FILES['flag']) && $_FILES['flag']['name']!='') {

            $config['upload_path']          = './assets/system_design/images/';
            $config['allowed_types']        = 'gif|jpg|png|svg';
            $config['file_name']        = $_POST['language'].'.png';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('flag'))
            {
                //$this->session->set_flashdata('errormsg','Image not uploding.');
                $this->session->set_flashdata('alert', [
                    'message' => "Image not uploding.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ]);
                redirect('admin/language/add');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $file_name = $data['upload_data']['file_name'];
            }
        }
        else{
            //$this->session->set_flashdata('errormsg','Please select an image.');
            $this->session->set_flashdata('alert', [
                    'message' => "Please select an image.",
                    'class' => "alert-danger",
                    'type' => "Error"
                ]);
            redirect('admin/language/add');
        }
        


        $data=array('title'=>$_POST['language'],
                'short_code'=>$_POST['Short_code'],
                'flag'=>$file_name,
                'Updated_at'=>date('Y-m-d H:i:s'),
                'status'=>$_POST['status'],
               );
        $lastid=$this->language_model->language_create($data);
        if($lastid)
        {
            //$this->session->set_flashdata('successmsg','languages Added Successfully.');
            $this->session->set_flashdata('alert', [
                    'message' => "languages Added Successfully.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
            redirect('admin/language/add');
        }
    }

    public function update_language($id)
    {


        $this->form_validation->set_rules('short_code', 'Short Code', 'required|max_length[2]|min_length[2]');
        $this->form_validation->set_rules('language', 'Language Name', 'required|max_length[40]|min_length[4]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errormsg','Fill the from correctly.');
            redirect('language/language/'.$id.'/edit');
        }

        $title = $this->input->post('language');
        $rows = $this->my_model->checkNumRows('languages',array('title'=>$title));
        if($rows > 1)
        {
            $this->session->set_flashdata('errormsg','languages Name is already Exist Please try another.');
            redirect('language/language/'.$id.'/edit');
        }
        $file_name = '';
        if (isset($_FILES['flag']) && $_FILES['flag']['name']!='') {

            $config['upload_path']          = './assets/system_design/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']        = $_POST['language'].'.png';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('flag'))
            {
                $this->session->set_flashdata('errormsg','Image not uploding.');
                redirect('language/language/'.$id.'/edit');
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $file_name = $data['upload_data']['file_name'];
            }
            $data=array('title'=>$_POST['language'],
                'short_code'=>$_POST['short_code'],
                'flag'=>$file_name,
                'Updated_at'=>date('Y-m-d H:i:s'),
                'status'=>$_POST['status'],
               );
        }
        else{
            $data=array('title'=>$_POST['language'],
                'short_code'=>$_POST['short_code'],
                'Updated_at'=>date('Y-m-d H:i:s'),
                'status'=>$_POST['status'],
               );
        }
        


        $condition = array('id'=>$id);
        $lastid=$this->my_model->update_table($condition,'languages',$data);
        if($lastid)
        {
            //$this->session->set_flashdata('successmsg','languages Updated Successfully.');
            $this->session->set_flashdata('alert', [
                    'message' => "languages Updated Successfully.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
            redirect('language/language/'.$id.'/edit');
        }
    }

    public function translations($id)
    {
        $data = [];
        $data['css_type']   = array("form","datatable");
        $data['active_class'] = "translations/".$id;
        $data['gmaps']      = false;
        
        $data['user'] = $this->basic_auth->user();

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        
        
        $title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where short_code = '".$id."'");
       
        $data['short_code'] = $title[0]['short_code'];
        $data['lang_title'] = $title[0]['title'];
        $data['title']      = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $title[0]['short_code'];
        $data['lang_id'] = $title[0]['id'];

        $data['language'] = $this->my_model->get_table_row_query("SELECT tr.id, lt.id as token_id, lt.description, lt.created_at, tr.translation FROM vbs_lang_token lt LEFT JOIN vbs_lang_trans tr ON lt.id = tr.token_id AND lang_id = '".$title[0]['id']."'");
        //$this->load->view('admin/translation',$data);
        // echo "<pre>";
        // print_r($data['language']);
        // echo "</pre>";
        // exit();
        $data['content']  = 'admin/language/translation';
        $this->load->view('templates/language_template',$data);
    }
    public function add_translations($id)
    {
        $data['css_type']   = array("form","datatable");
        $data['active_class'] = "dashboard";
        $data['gmaps']      = false;
        
        $data['user'] = $this->basic_auth->user();

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');
        $title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where short_code = '".$id."'");
       
        $data['short_code'] = $title[0]['short_code'];
        $data['lang_title'] = $title[0]['title'];
        $data['title']      = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $this->lang->line("translation").' >> '.$title[0]['short_code'];
        $data['lang_id'] = $title[0]['id'];

        //$this->load->view('admin/add_translation',$data);
        $data['content']  = 'admin/language/add_translation';
        $this->load->view('templates/language_template',$data);
    }
    public function importcsv_translations($id)
    {

        $data['css_type']   = array("form");
        $data['active_class'] = "dashboard";
        $data['gmaps']      = false;
        $data['title']        = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $this->lang->line("import_csv");
        $data['user'] = $this->basic_auth->user();
        $title = $this->my_model->get_table_row_query("SELECT id FROM vbs_languages where short_code = '".$id."'");
        $data['lang_id'] = $title[0]['id'];
        $data['short_code'] = $id;

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        $data['content']  = 'admin/language/import_translation';
        $this->load->view('templates/language_template',$data);
    }
    public function import_csv(){
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
            if($c != 0){ 
                $title = $this->my_model->get_table_row_query("SELECT id FROM vbs_lang_token where lang = '".$_POST['lang_id']."' AND description = '".$filesop[2]."'");
                $token = $this->my_model->get_table_row_query("SELECT id FROM vbs_lang_trans where lang_id = '".$_POST['lang_id']."' AND token_id = '".$title[0]['id']."'");

                if(isset($token[0]['id']) && $token[0]['id'] != ''){
                    $data=array(
                        'translation'=> $filesop[3]
                    );
                    $condition = array('id'=>$token[0]['id']);
                    $lastid=$this->my_model->update_table($condition,'lang_trans',$data);
                }
                else{
                    $data=array('lang_id'=>$_POST['lang_id'],
                        'token_id'=> $title[0]['id'],
                        'translation'=> $filesop[3],
                    );
                    $lastid=$this->language_model->taran_inner_create($data);
                }
                              
            }   
            else {
                $c = $c + 1;
            }         
        }
        $this->session->set_flashdata('alert', [
                            'message' => "Translation Updated successfull.",
                            'class' => "alert-success",
                            'type' => "Success"
                        ]);
                $this->updatelangfile($lang_id);
                redirect('admin/translations/'.$_POST['short_code']);
    }

    public function edit_translation($lang){
        $data['css_type']   = array("form","datatable");
        $data['active_class'] = "dashboard";
        $data['gmaps']      = false;
        
        $data['user'] = $this->basic_auth->user();

        $this->load->model('calls_model');
        $this->load->model('request_model');
        $this->load->model('jobs_model');

        foreach ($_POST['translation'] as $key => $value) {
            if($i == 0){
                $in .= "'".$value."'";
                $i = 1;
            }
            else{
                $in .= ",'".$value."'";
            }
        }

        $title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where short_code = '".$lang."'");
       
        $data['short_code'] = $title[0]['short_code'];
        $data['lang_title'] = $title[0]['title'];
        $data['title']      = $this->lang->line("languages");
        $data['title_link']     = base_url('admin/language');
        $data['subtitle']     = $this->lang->line("translation").' >> '.$title[0]['short_code'];;
        $data['lang_id'] = $title[0]['id'];
        $data['id'] = $id;
        $i = 0;
        $in = '';
        foreach ($_POST['translation'] as $key => $value) {
            if($i == 0){
                $in .= "'".$value."'";
                $i = 1;
            }
            else{
                $in .= ",'".$value."'";
            }
        }
                //$data['language'] = $this->my_model->get_table_row_query("SELECT * FROM vbs_lang_token where id in (".$in.")");
        $data['language'] = $this->my_model->get_table_row_query("SELECT lt.id, lt.description, lt.created_at, tr.id as trans_id, tr.translation FROM vbs_lang_token lt LEFT JOIN vbs_lang_trans tr ON lt.id = tr.token_id AND tr.lang_id = '".$title[0]['id']."' where tr.id in (".$in.")");
        //print_r($data['language']);
        //$this->load->view('admin/edit_translation',$data);  
        $data['content']  = 'admin/language/edit_translation';
        $this->load->view('templates/language_template',$data);
    }

    public function store_translation(){
        $title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where id = '".$_POST['lang_id']."'");
        foreach ($_POST['hook'] as $key => $value) {
            $data=array('lang'=>$_POST['lang_id'],
                'token_id'=> $value,
                'translation'=>$_POST['trans'][$key],
               );
            $lastid=$this->language_model->translation_create($data);
        }
        $this->session->set_flashdata('alert', [
                    'message' => "Translation Added successfull.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
        $this->updatelangfile($_POST['lang_id']);
        redirect('admin/translations/'.$title[0]['short_code']);
    }

    public function update_transl($lang_id,$id){
        $title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where id = '".$lang_id."'");
        foreach ($_POST['uper_id'] as $key => $value) {
            if($_POST['teans_id'][$key] != ''){
                $data=array(
                    'translation'=> $_POST['trans'][$key]
                );
                $condition = array('id'=>$_POST['teans_id'][$key]);
                $lastid=$this->my_model->update_table($condition,'lang_trans',$data);
            }
            else{
                $data=array('lang_id'=>$_POST['lang'],
                    'token_id'=> $value,
                    'translation'=> $_POST['trans'][$key],
                );
                $lastid=$this->language_model->taran_inner_create($data);
            }
            
        }
        $this->session->set_flashdata('alert', [
                    'message' => "Translation Updated successfull.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
        $this->updatelangfile($lang_id);
        redirect('admin/translations/'.$title[0]['short_code']);
    }
    public function update_translation(){
        //$title = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where id = '".$lang_id."'");
        if($_GET['id'] != ''){
            $data=array(
                $_GET["column"] => $_GET['data']
            );
            $condition = array('id'=>$_GET['id']);
            $lastid=$this->my_model->update_table($condition,'lang_trans',$data);
        }  
        else{

            $data=array('lang_id'=>$_GET['lang_id'],
                'token_id'=> $_GET['token_id'],
                'translation'=> $_GET['data'],
            );
            $lastid=$this->language_model->taran_inner_create($data);
            //echo $lastid;
            } 
        $this->updatelangfile($_GET['lang_id']);
    }
    public function update_token(){
        if($_GET['token_id'] != ''){
            $data=array(
                $_GET["column"] => $_GET['data']
            );
            $condition = array('id'=>$_GET['token_id']);
            $lastid=$this->my_model->update_table($condition,'lang_token',$data);
        }  
        $this->updatelangfile($_GET['lang_id']);
    }
    public function delete_translation($id){
        foreach ($_POST['translation'] as $key => $value) {
            $condition = array('id'=>$value);
            $del = $this->my_model->delete_table($condition,'lang_token');
        }
        $this->session->set_flashdata('alert', [
                    'message' => "Translation Deleted successfull.",
                    'class' => "alert-success",
                    'type' => "Success"
                ]);
        $this->updatelangfile($id);
        redirect('language/translations/'.$title[0]['short_code']);
    }

    function updatelangfile($my_lang){
        // $this->db->where('lang',$my_lang);
        // $query=$this->db->get('vbs_lang_token');
        $query = $this->my_model->get_table_row_query("SELECT lt.id, lt.description, lt.created_at, tr.translation FROM vbs_lang_token lt JOIN vbs_lang_trans tr ON lt.id = tr.token_id where tr.lang_id = '".$my_lang."'");
        $language = $this->my_model->get_table_row_query("SELECT * FROM vbs_languages where id = '".$my_lang."'");
        
        $lang_name = $language[0]['title'];
        $lang=array();
        $langstr="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
                /**
                *
                * Created:  2014-05-31 by CubesCode
                *
                * Description:  ".$lang_name." language file for general views
                *
                */"."\n\n\n";

        $trans = json_decode(json_encode($query));
        
        foreach ($trans as $row){
            //$lang['error_csrf'] = 'This form post did not pass our security checks.';
            $langstr.= "\$lang['".$row->description."'] = \"$row->translation\";"."\n";
        }
        if (!file_exists('./application/language/'.$lang_name)) {
            mkdir('./application/language/'.$lang_name, 0777, true);
        }
        write_file('./application/language/'.$lang_name.'/general_lang.php', $langstr);
        

    }
}
?>