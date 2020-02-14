<?php

error_reporting(E_ALL);

defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends MY_Controller



{

    function __construct()

    {

        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));

        $this->load->library('session');

        $this->lang->load('auth');

        $this->lang->load('general');

        $this->load->helper('language');
        $this->load->model("chat_model");
        

    

        $this->data['user'] = $this->basic_auth->user();

        $this->load->model('request_model');

        $this->load->model('jobs_model');

        $this->load->model('support_model');

        $this->load->model('calls_model');
            



        $this->data['configuration'] = get_configuration();

    }





    public function index(){

        // echo 123;exit;

        $this->data['css_type']     = array("form","datatable");

        $this->data['active_class'] = "messages";

        $this->data['gmaps']        = false;

        $this->data['title']        = $this->lang->line('messages');

        $this->data['content']      = 'admin/messages';



        $this->load->model('calls_model');

        $this->load->model('request_model');

        $this->load->model('jobs_model');

        $this->load->model('support_model');





        $data = [];

        $data['request'] = $this->request_model->getAll();

        $data['jobs']    = $this->jobs_model->getAll();

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

    function changechatboxstatus()
    {
       $this->load->model("chat_model");
       $this->chat_model->changechatingboxsetting($_GET['status']);
        echo "Done";
    }

    function insertchatdata()
    {
       $this->load->model("chat_model");
       $name = $_GET['username'];
       $email = $_GET['email'];
       $telephone = $_GET['telephone'];
       $ipaddress = $_SERVER['REMOTE_ADDR'];
       $res = $this->chat_model->insertbasicchatdetails($name,$email,$telephone,$ipaddress);
       // print_r($res);exit;
       if($res['status']==0)
       {
         $this->session->set_userdata("chatuserexist",true);
         $this->session->set_userdata("userid",$res['userid']);
         echo json_encode(array('status'=>'false','userid'=>$res['userid']));
       }
       else
       {
         $this->session->set_userdata("chatuserexist",true);
         $this->session->set_userdata("chatuserid",$res['userid']);
         $message_history = $this->chat_model->getusermessages($res['userid']);
         $messages_html = '';
         foreach($message_history as $val){
            $messages_html .= '<div class="users-chat-div2"><div class="usercontent-div"><p><strong>';
            if($val->userid_from==1)
            {
                $messages_html .= 'Admin';
            }else
            { 
                $messages_html .= 'Me';
            }
            $messages_html .= '</strong></p><p>'.$val->message_text.'</p><span class="real-chat-badge"><small>'.date('Y-m-d',strtotime($val->dateandtime)).'</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span></div></div>';
         }
         echo json_encode(array('status'=>'true','userid'=>$res['userid'],'message_history'=>$messages_html));
       }
    }

    function insertchatmessagedata()
    {
        $messagetext = $_POST['messagetext'];
        $userid_from = $_POST['userid'];
        // $attachfile = $_FILES['chatfile']['name'];
        $attachfile = trim(str_replace(" ", "_", $_FILES['chatfile']['name']));

        $this->load->model("chat_model");
        $this->do_fileupload($attachfile);
        // $messagetext = $_GET['messagetext'];
        $res = $this->chat_model->insertchatmessagedatadetails($userid_from,$messagetext,$attachfile);  
        $this->chat_model->updatesoundstatus(); 

        if($res["attachfile"]==""){
        echo '<div class="users-chat-div2">
                   <div class="usercontent-div">';
                  echo'<p><strong>Me</strong></p>';
                   echo'<p>'.$res["message_text"].'</p>
                    <span class="real-chat-badge"><small>'.date('Y-m-d',strtotime($res["dateandtime"])).'</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
                </div>';  
        }
        else
        {
            echo '<div class="users-chat-div2">
                   <div class="usercontent-div">';
                  echo'<p><strong>Me</strong></p>';
                  echo'<img src="'.base_url().'assets/chat_files/'.$res["attachfile"].'" width="150">';
                   echo'<p>'.$res["message_text"].'</p>
                    <span class="real-chat-badge"><small>'.date('Y-m-d',strtotime($res["dateandtime"])).'</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
                </div>'; 
        }
    }

    function getallnewmessages()
    {
        $res = $this->chat_model->getallnewmessageshistory();
        // $sound_res = $this->chat_model->getchat_sound_status();
        // echo "<pre>";
        // print_r($sound_res);exit;
        $html_data = '';
        foreach($res as $val)
        {
            $last_message = $this->chat_model->getlast_message($val->userid_from);
            $count_message = $this->chat_model->getcount_message($val->userid_from);
            // echo "<pre>";
            // print_r($last_message);
            $name_i = "'".$val->name."'";
            $html_data .= '<div class="users-chat-div hide-chat-box2" onclick="getspecificuserchathistory('.$val->userid_from.','.$name_i.')">
               <div class="user-image-div">
                   <img src="'.base_url().'assets/default.jpg" class="circle-rounded">
                   <i class="fa fa-circle fa-circle2 status_active" aria-hidden="true"></i>
               </div>
               <div class="usercontent-div">';
            $html_data .= '<p data-title="User &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\A Detail Box User \A Detail Box User \A Detail Box User \A Detail Box"><strong>'.$val->name.' (Visitor)</strong></p>';
            if($last_message['message_text']=="")
            {
                $html_data .= '<p>File ['.substr($last_message["attachfile"],0,20).']</p>';  
            }
            else
            {
                $html_data .= '<p>'.substr($last_message["message_text"],0,18).'</p>';
            }
            if($count_message==0){

            }
            else
            {
                $html_data .= '<span class="badge badge-danger chat-badge">'.$count_message.'</span>';
            }            
            

            $timestamp = strtotime($last_message['dateandtime']);   
            $strTime = array("s", "mn", "h", "d", "m", "y");
            $length = array("60","60","24","30","12","10");

            $currentTime = time();
            if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            $html_data .= '<span class="chat-badge-time">'.$diff.$strTime[$i].'</span>';
            // return $diff . " " . $strTime[$i] . "(s)";
           }
            
            $html_data .= '</div></div>';
        }
        // echo $html_data;exit;
        // echo json_encode(array("sound_status"=>$sound_res["is_chat_sound_status"],"ischat_open"=>$sound_res["is_chat_open"],"chat_html_data"=>$html_data));
        echo $html_data;
    }

    function checksoundstatusdata()
    {
        $sound_res = $this->chat_model->getchat_sound_status();
        echo json_encode(array("sound_status"=>$sound_res["is_chat_sound_status"],"ischat_open"=>$sound_res["is_chat_open"]));
    }

    function fnctimeago($date) {
       $timestamp = strtotime($date);   
       
       $strTime = array("second", "minute", "hour", "day", "month", "year");
       $length = array("60","60","24","30","12","10");

       $currentTime = time();
       if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
       }
    }

    function getallspecificusermessages()
    {
        $res = $this->chat_model->getallspecificusermessageshistory($_GET['userid']);
        $this->chat_model->updateallspecificusermessageshistory($_GET['userid']);

        echo '<ul class="p-0" id="chat_ul" style="padding-left: 0px !important; padding-top: 10px;">';
        foreach($res as $val)
        {
            if($val->type==1)
            {
                if($val->attachfile=="")
                {
                    echo '<li class="p-1 rounded mb-1">
                        <div class="receive-msg">
                        <div class="row">
                        <div class="col-md-2" style="padding:0px; padding-left:5px;">
                            <img src="'.base_url().'assets/default.jpg">
                        </div>
                        <div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2">
                        <span class="dateandtime_class">'.date("Y-m-d",strtotime($val->dateandtime)).' '.date("H:i",strtotime($val->dateandtime)).'</span>
                            <p class="pl-2 pr-2 rounded"><span>'.$val->message_text.'</span></p>
                        </div>
                        </div>
                        </div>
                        </li>';
                    // echo '<li class="pl-2 pr-2 bg-primary rounded text-white send-msg mb-1">'.$val->message_text. '</li>';
                }
                else{

                    $ext = pathinfo($val->attachfile, PATHINFO_EXTENSION);
                    if($ext=="png" or $ext=="PNG" or $ext=="jpg" or $ext=="jpeg" or $ext=="gif")
                    {
                        echo '<li class="pl-1 rounded mb-1"><div class="receive-msg"><div class="row"><div class="col-md-2" style="padding:0px;padding-left:5px;"><img src="'.base_url().'assets/default.jpg"></div><div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2"><span class="dateandtime_class">'.date("Y-m-d",strtotime($val->dateandtime)).' '.date("H:i",strtotime($val->dateandtime)).'</span><div class="bgcolor"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$val->attachfile.'" target="_blank"><img src="'.base_url().'assets/chat_files/'.$val->attachfile.'" width="200"><p class="image_name">'.substr($val->attachfile,0,15).'</p></a></div>'.$val->message_text. '</div></div></div></div></li>';
                    }
                    else
                    {
                        echo '<li class="pl-1 rounded mb-1"><div class="receive-msg"><div class="row"><div class="col-md-2" style="padding:0px;padding-left:5px;"><img src="'.base_url().'assets/default.jpg"></div><div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2"><span class="dateandtime_class">'.date("Y-m-d",strtotime($val->dateandtime)).' '.date("H:i",strtotime($val->dateandtime)).'</span><div class="bgcolor"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$val->attachfile.'" target="_blank"><img src="'.base_url().'assets/chat_files/file_upload_image.png" width="200"><p class="image_name">'.substr($val->attachfile,0,15).'</p></a></div>'.$val->message_text. '</div></div></div></div></li>';
                        // echo '<li class="pl-2 pr-2 bg-primary rounded text-white send-msg mb-1"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$val->attachfile.'" target="_blank"><img src="'.base_url().'assets/chat_files/file_upload_image.png" width="200"><p>'.substr($val->attachfile,0,15).'</p></a></div>'.$val->message_text. '</li>';                        
                    }
                    // echo '<li class="pl-2 pr-2 bg-primary rounded text-white send-msg mb-1"><div class="text-center" style="padding-top:5px;"><img src="'.base_url().'assets/chat_files/'.$val->attachfile.'" width="150"></div>'.$val->message_text. '</li>';
                }
            }
            else
            {
                echo '<li class="p-1 rounded mb-1">
                <div class="receive-msg">
                <div class="row">
                <div class="col-md-2" style="padding:0px;padding-left:5px;">
                    <img src="'.base_url().'assets/default.jpg">
                </div>
                <div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2">
                <span class="dateandtime_class">'.date("Y-m-d",strtotime($val->dateandtime)).' '.date("H:i",strtotime($val->dateandtime)).'</span>
                    <p class="pl-2 pr-2 rounded"><span>'.$val->message_text.'</span></p>
                </div>
                </div>
                </div>
                </li>';
            }
        }
        echo '</ul>';
       $this->change_is_chat_open_status();
        // print_r($res);
    }


    function insertadminreply()
    {
        // echo 'i am here';
        // var_dump($_POST);
        $attachfile = trim(str_replace(" ", "_", $_FILES['chatfile']['name']));
        // echo $attachfile;exit;
        // $target = base_url()."assets/chat_files/";
        // move_uploaded_file($_FILES["chatfile"]["tmp_name"],$target.$attachfile);
        $res = $this->chat_model->insertadminreplydata($_POST['userid'],$_POST['messagetext'],$attachfile);

        $this->do_fileupload($attachfile);
        if($res["attachfile"]=="")
        {
            // echo '<li class="pl-2 pr-2 rounded text-white send-msg mb-1">'.$res["message_text"]. '</li>';
            echo '<li class="p-1 rounded mb-1">
                <div class="receive-msg">
                <div class="row">
                <div class="col-md-2" style="padding:0px;padding-left:5px;">
                    <img src="'.base_url().'assets/default.jpg">
                </div>
                <div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2">
                <span class="dateandtime_class">'.date("Y-m-d",strtotime($res["dateandtime"])).' '.date("H:i",strtotime($res["dateandtime"])).'</span>
                    <p class="pl-2 pr-2 rounded"><span>'.$res["message_text"].'</span></p>
                </div>
                </div>
                </div>
                </li>';
        }
        else
        {
            $ext = pathinfo($res["attachfile"], PATHINFO_EXTENSION);
            if($ext=="png" or $ext=="PNG" or $ext=="jpg" or $ext=="jpeg" or $ext=="gif")
            {
                // <div class="text-right dateandtime_class">'.date("Y-m-d",strtotime($res["dateandtime"])).' '.date("H:i",strtotime($res["dateandtime"])).'</div>
                // echo '<li class="pl-2 pr-2 bg-primary rounded text-white send-msg mb-1"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$res["attachfile"].'" target="_blank"><img src="'.base_url().'assets/chat_files/'.$res["attachfile"].'" width="200"><p>'.substr($res["attachfile"],0,15).'</p></a></div>'.$res["message_text"]. '</li>';
                echo '<li class="pl-1 rounded mb-1"><div class="receive-msg"><div class="row"><div class="col-md-2" style="padding:0px;padding-left:5px;"><img src="'.base_url().'assets/default.jpg"></div><div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2"><div class="bgcolor"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$res["attachfile"].'" target="_blank"><img src="'.base_url().'assets/chat_files/'.$res["attachfile"].'" width="200"><p class="image_name">'.substr($res["attachfile"],0,15).'</p></a></div>'.$res["message_text"]. '</div></div></div></div></li>';
            }
            else
            {
                // echo '<li class="pl-2 pr-2 bg-primary rounded text-white send-msg mb-1"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$res["attachfile"].'" target="_blank"><img src="'.base_url().'assets/chat_files/file_upload_image.png" width="200"><p>'.substr($res["attachfile"],0,15).'</p></a></div>'.$res["message_text"]. '</li>';
                echo '<li class="pl-1 rounded mb-1"><div class="receive-msg"><div class="row"><div class="col-md-2" style="padding:0px;padding-left:5px;"><img src="'.base_url().'assets/default.jpg"></div><div class="col-md-10 receive-msg-desc mt-1 ml-1 pl-2 pr-2"><div class="bgcolor"><div class="text-center" style="padding-top:5px;"><a href="'.base_url().'assets/chat_files/'.$res["attachfile"].'" target="_blank"><img src="'.base_url().'assets/chat_files/file_upload_image.png" width="200"><p class="image_name">'.substr($res["attachfile"],0,15).'</p></a></div>'.$res["message_text"]. '</div></div></div></div></li>';
            }
        }
    }

    public function do_fileupload($attachfile)
    { 
        $config['upload_path']   = 'assets/chat_files';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['overwrite']     = FALSE;
        $config['file_name']     = $attachfile;
        $config['max_size']      = '100000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('chatfile')) {
            $error = array(
                'error' => $this->upload->display_errors()
            );

        }      
    }

    function getvisitorschathistory()
    {
        $sound_user_status = $this->chat_model->getuserchatsoundstatus($_GET['userid']);
        $message_history = $this->chat_model->getvisitorchathistory($_GET['userid']);
        foreach($message_history as $val){ 
            if($val->attachfile==""){
                echo '<div class="users-chat-div2">
                   <div class="usercontent-div">';
                    echo '<p><strong>';
                    if($val->type==1){
                        echo'Admin';
                    }
                    else{
                        echo 'Me';
                    }
                     echo'</strong></p>';
                    echo '<p>'. $val->message_text.'</p>';
                    echo '<span class="real-chat-badge"><small>'.date('Y-m-d',strtotime($val->dateandtime)).' '.date('H:i',strtotime($val->dateandtime)).'</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
                </div>';
             }
             else
             {
                echo '<div class="users-chat-div2">
                   <div class="usercontent-div">';
                    echo '<p><strong>';
                    if($val->type==1){
                        echo'Admin';
                    }
                    else{
                        echo 'Me';
                    }
                     echo'</strong></p>';
                     echo'<p><img src="'.base_url().'assets/chat_files/'.$val->attachfile.'" width="150"></p>';
                    echo '<p>'. $val->message_text.'</p>';
                    echo '<span class="real-chat-badge"><small>'.date('Y-m-d',strtotime($val->dateandtime)).' '.date('H:i',strtotime($val->dateandtime)).'</small> <i class="fa fa-check" aria-hidden="true"> </i><i class="fa fa-check" aria-hidden="true"></i></span>
                   </div>
                </div>';
             }
        }

        if($sound_user_status["chat_sound_status"]==1)
        {
            echo "<script> var audio = new Audio('".base_url()."assets/chat_audio_sound.mp3');
                        audio.play(); </script>";
        }
    }

    function getallpendingmessages()
    {
        $res = $this->chat_model->getallpendingmessagescount();
        echo $res;
    }

    function changechatsound_status()
    {
        $res = $this->chat_model->updatechatsound_val();
        echo "Sound Done";
    }

    function change_is_chat_open_status()
    {
        $this->chat_model->updatechat_open_status();
        // echo "Open chat done";
    }

    function change_is_chat_open_status_to_off()
    {
        $this->chat_model->updatechat_open_status_off();
    }

    function change_is_chat_open_status_to_on()
    {
        $this->chat_model->updatechat_open_status_on();
    }

    function updatemessagesoundforuserdatadiv()
    {
        $this->chat_model->updatesoundstatusdivdata($_GET['userid']);
    }

}