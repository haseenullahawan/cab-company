<?php
/**
 * Created by PhpStorm.
 * User: Hello World
 * Date: 04/08/2019
 * Time: 9:51 PM
 */



function request_validate(){
    $reqInputs = [
        'civility'  => 'Civility',
        'name'      => 'Nom',
        'prename'   => 'Prenom',
        'email'     => 'Votre email',
        'tel'       => 'Telephone',
        'message'   => 'Votre message',
        //'dob'       => 'Date de naissance',
    ];

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
        if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
            $error[] = "S'il vous plaît entrer un email valide.";
        }
        if($key == "tel" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
            $error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
        }
/*        if($key == "dob" AND !valid_date($_POST[$key])){
            $error[] = "Veuillez entrer une date valide";
        } elseif($key == "dob" AND calculateAge(to_unix_date($_POST[$key])) < 18){
            $error[] = "l'âge doit être supérieur à 18 ans";
        }*/
    }

    return $error;
}

function absence_request_validate(){
    $reqInputs = [
        'status'  => 'Status',
        'from_date'      => 'From Date',
        'from_morning'   => 'From Morning',
        'to_date'     => 'To Date',
        'to_morning'       => 'To Morning',
    ];

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
    }

    return $error;
}

function vacation_request_validate(){
    $reqInputs = [
        'status'         => 'Status',
        'from_date'      => 'From Date',
        'from_morning'   => 'From Morning',
        'to_date'        => 'To Date',
        'to_morning'     => 'To Morning',
    ];

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
    }

    return $error;
}

function salary_request_validate(){
    $reqInputs = [
        'status'        => 'Status',
        'amount'        => 'Amount',
        'time_deduce'   => 'Time Deduce',
        'payment_method'=> 'Payment Method',
        'date'          => 'Date',
    ];

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
    }

    return $error;
}

function notes_request_validate(){
    $reqInputs = [
        'status'            => 'Status',
        'category'          => 'Category',
        'payment_method'    => 'Payment Method',
        'date'              => 'Date',
        'notes_amount'      => 'Amount',
        'notes_paid_amount' => 'Paid Amount',
    ];


    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
    }

    return $error;
}

function drivers_request_validate(){
    $reqInputs = [
        'civility'  => 'Civility',
        'name'      => 'Nom',
        'prename'   => 'Prenom',
        'email'     => 'Votre email',
        'tel'       => 'Telephone',
        'message'   => 'Votre message',
        //'dob'       => 'Date de naissance',
    ];

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check){
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
        if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
            $error[] = "S'il vous plaît entrer un email valide.";
        }
        if($key == "tel" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
            $error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
        }
/*        if($key == "dob" AND !valid_date($_POST[$key])){
            $error[] = "Veuillez entrer une date valide";
        } elseif($key == "dob" AND calculateAge(to_unix_date($_POST[$key])) < 18){
            $error[] = "l'âge doit être supérieur à 18 ans";
        }*/
    }

    return $error;
}

function job_validate($cvReq = true){
    $reqInputs = [
        'civility'  => 'Civility',
        'name'      => 'Nom',
        'prename'   => 'Prenom',
        'email'     => 'Votre email',
        //'tel'       => 'Telephone',
        'postal_code' => 'Code postal',
        'offer'     => 'Job Offer',
        'dob'       => 'Date de naissance',
    ];

     if($cvReq)
        $reqInputs['cv'] = 'CV';

    $error = [];
    foreach($reqInputs as $key => $input){
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if($check && !in_array($key, ['message','letter','cv']) ){
            $error[] = "Merci de compléter toutes les cases correctement.$key";
        }
        if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
            $error[] = "S'il vous plaît entrer un email valide.";
        }
        if($key == "tel" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])){
            $error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
        }
        if($key == "dob" AND !valid_date($_POST[$key])){
            $error[] = "Veuillez entrer une date valide";
        } elseif($key == "dob" AND calculateAge(to_unix_date($_POST[$key])) < 18){
            $error[] = "l'âge doit être supérieur à 18 ans";
        }
        if($key == "cv" AND (!isset($_FILES['cv']) || empty($_FILES['cv']['name'])))
            $error[] = "veuillez joindre cv.";
    }
    return $error;
}

function valid_date($date){
    $resp = false;
    $test_arr  = explode('/', $date);
    if (count($test_arr) == 3) {
        if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
           $resp = true;
        }
    }
    return $resp;
}

function to_unix_date($date){
    $test_arr  = explode('/', $date);
    return valid_date($date) ? $test_arr[2] . "-" . $test_arr[1] . "-" . $test_arr[0] : null;
}

function from_unix_date($date, $format = "d/m/Y"){
    return !empty($date) ? date($format, strtotime($date)) : "";
}

function from_unix_time($date, $format = "H:i:s"){

    return !empty($date) ? date($format, strtotime($date)) : "";
}

function timeDiff($date){
    $expiry_time = new DateTime($date);
    $current_date = new DateTime();

    $diff = $expiry_time->diff($current_date);
    return $diff->format('%a Days %H Hours %I Minutes');
}

function calculateAge($date){
    if($date !== date("Y-m-d", strtotime($date))) return null;

    $birthDate = explode("-", $date);
    //get age from date or birthdate
    return (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
}


function createJobFilesPath(){

    if (!is_dir('uploads'))
        mkdir('./uploads', 0777, true);

    if (!is_dir('uploads/jobs'))
        mkdir('./uploads/jobs', 0777, true);

    if (!is_dir('uploads/jobs/cv'))
        mkdir('./uploads/jobs/cv', 0777, true);

    if (!is_dir('uploads/jobs/cv/'.date('Y-m-d')))
        mkdir('./uploads/jobs/cv/'.date('Y-m-d'), 0777, true);

    if (!is_dir('uploads/jobs/letter'))
        mkdir('./uploads/jobs/letter', 0777, true);

    if (!is_dir('uploads/jobs/letter/'.date('Y-m-d')))
        mkdir('./uploads/jobs/letter/'.date('Y-m-d'), 0777, true);
}

function createFileManagementFilesPath(){

    if (!is_dir('uploads'))
        mkdir('./uploads', 0777, true);

    if (!is_dir('uploads/files'))
        mkdir('./uploads/files', 0777, true);
}


function call_validate(){
    $error = [];
    $reqInputs = [
        'civility'  => 'Civility',
        'name'      => 'Nom',
        'prename'   => 'Prenom',
        'email'     => 'Votre email',
        'num' 		=> 'Telephone',
//        'dob'       => 'Date de naissance',
    ];

    foreach ($reqInputs as $key => $input) {
        $check = !isset($_POST[$key]) || $_POST[$key] == "" || empty($_POST[$key]);
        if ($check) {
            $error[] = "Merci de compléter toutes les cases correctement.";
        }
        if($key == "email" AND !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)){
            $error[] = "S'il vous plaît entrer un email valide.";
        }
        if ($key == "num" AND !preg_match('/^0[0123456790]\d{8}$/', $_POST[$key])) {
            $error[] = "Veuillez entrer un numéro de téléphone valide avec 10 chiffres commençant par 0.";
        }
        if($key == "dob" AND !valid_date($_POST[$key])){
            $error[] = "Veuillez entrer une date valide";
        } elseif($key == "dob" AND calculateAge(to_unix_date($_POST[$key])) < 18){
            $error[] = "l'âge doit être supérieur à 18 ans";
        }
    }
    return $error;
}


/*function sendReply($obj, $subject, $message, $type = "contact"){

    require_once(APPPATH."third_party/phpmailer/Exception.php");
    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
    require_once(APPPATH."third_party/phpmailer/SMTP.php");
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $emailMessage = nl2br($message) . "<br>";

    $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
    $emailMessage .= "Service secrétariat</h4>";
    $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
    $emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
    $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
    $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
    $emailMessage .= "<p><b>Adresse : </b>du siège social : 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";


    try {
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host     = 'tls://smtp.office365.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;
        $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
        $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
        $mail->addReplyTo($replyTo, 'Handi Express');
        $mail->Username = 'direction@handi-express.fr';                 // SMTP username
        $mail->Password = 'Hanouf77';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('direction@handi-express.fr', 'Handi Express');
        $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $emailMessage;
        $check = $mail->send();
        return [
            'status' => true,
            'message' => 'Message sent'
        ];
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        return [
            'status' => false,
            'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
        ];
    }
}*/

/*function sendReply($obj, $subject, $message, $type = "contact", $MAIL=null, $module=array(),$newsletter_test=array()){
    $CI        = &get_instance();
    require_once(APPPATH."third_party/phpmailer/Exception.php");
    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
    require_once(APPPATH."third_party/phpmailer/SMTP.php");
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $emailMessage = nl2br($message) . "<br>";

    $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
    $emailMessage .= "Service secrétariat</h4>";
    $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
    $emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
    $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
    $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
    $emailMessage .= "<p><b>Adresse : </b>du siège social : 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";

    if($MAIL == null || empty($MAIL)){
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host     = 'tls://smtp.office365.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            $mail->addReplyTo($replyTo, 'Handi Express');
            $mail->Username = 'direction@handi-express.fr';                 // SMTP username
            $mail->Password = 'Hanouf77';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('direction@handi-express.fr', 'Handi Express');
            if(!empty($newsletter_test)){
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
            }
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            if(!empty($module)){
                $subject = str_replace("{department_name}",$module[0],$subject);
            }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            if(!empty($module)){
                $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            }
            $mail->Body    = $emailMessage;
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }else{
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            if(!empty($newsletter_test)){
                $mail->Host     = $MAIL->smtp_host_1;  // Specify main and backup SMTP servers
            }else{
                $mail->Host     = $MAIL->smtp_host;  // Specify main and backup SMTP servers
            }
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            if(!empty($newsletter_test)){
                $mail->addReplyTo($replyTo, $MAIL->smtp_name_1);
            }else{
                $mail->addReplyTo($replyTo, $MAIL->name);
            }
            if(!empty($newsletter_test)){
                $mail->Username = $MAIL->smtp_user_1;                 // SMTP username
                $mail->Password = $MAIL->smtp_password_1;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port_1;                                    // TCP port to connect to
            }else{
                $mail->Username = $MAIL->smtp_user;                 // SMTP username
                $mail->Password = $MAIL->smtp_password;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port;                                    // TCP port to connect to
            }
            //Recipients
            if(!empty($newsletter_test)){
                $mail->setFrom('direction@handi-express.fr', $MAIL->smtp_name_1);
            }else{
                $mail->setFrom('direction@handi-express.fr', $MAIL->name);
            }
            if(!empty($newsletter_test)){
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
            }
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            if(!empty($module)){
                $subject = str_replace("{department_name}",$module[0],$subject);
            }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            if(!empty($module)){
                $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            }
            $mail->Body    = $emailMessage;
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }
}*/

function sendReply($obj, $subject, $message, $type = "contact", $MAIL=null, $module=array(),$newsletter_test=array(),$attachment=""){
    $CI        = &get_instance();
    require_once(APPPATH."third_party/phpmailer/Exception.php");
    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
    require_once(APPPATH."third_party/phpmailer/SMTP.php");
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $emailMessage = nl2br($message) . "<br>";

    $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
    $emailMessage .= "Service secrétariat</h4>";
    $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
    $emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
    $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
    $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
    $emailMessage .= "<p><b>Adresse : </b>du siège social : 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";

    if($MAIL == null || empty($MAIL)){
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host     = 'tls://smtp.office365.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            $mail->addReplyTo($replyTo, 'Handi Express');
            $mail->Username = 'direction@handi-express.fr';                 // SMTP username
            $mail->Password = 'Hanouf77';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('direction@handi-express.fr', 'Handi Express');
            if(!empty($newsletter_test)){
                $string = $MAIL->smtp_path_to_send_mail_1; 
                if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $string = $MAIL->path_to_send_mail; 
                    if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
            }
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            if(!empty($module)){
                $subject = str_replace("{department_name}",$module[0],$subject);
            }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            if(!empty($module)){
                $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            }else{
                $subject = str_replace("{department_name}","",$subject);
            }
            $mail->Body    = $emailMessage;
            if($attachment != ""){
                $attachment = explode(",", $attachment);
                foreach ($attachment as $at) {
                    $mail->addAttachment("uploads/attachment/".$at, $at);
                }
            }
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }else{
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            if(!empty($newsletter_test)){
                $mail->Host     = $MAIL->smtp_host_1;  // Specify main and backup SMTP servers
            }else{
                $mail->Host     = $MAIL->smtp_host;  // Specify main and backup SMTP servers
            }
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            if(!empty($newsletter_test)){
                if($MAIL->smtp_send_copy_to_sender_1 == 1){
                    $mail->addReplyTo($replyTo, $MAIL->smtp_name_1);
                }
            }else{
                if($MAIL->send_copy_to_sender == 1){
                    $mail->addReplyTo($replyTo, $MAIL->name);
                }
            }
            if(!empty($newsletter_test)){
                $mail->Username = $MAIL->smtp_user_1;                 // SMTP username
                $mail->Password = $MAIL->smtp_password_1;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port_1;                                    // TCP port to connect to
            }else{
                $mail->Username = $MAIL->smtp_user;                 // SMTP username
                $mail->Password = $MAIL->smtp_password;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port;                                    // TCP port to connect to
            }
            //Recipients
            if(!empty($newsletter_test)){
                $mail->setFrom($MAIL->smtp_user_1, $MAIL->smtp_name_1);
            }else{
                $mail->setFrom($MAIL->smtp_user, $MAIL->name);
            }
            /*if(!empty($newsletter_test)){
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
            }*/
            if(!empty($newsletter_test)){
                $string = $MAIL->smtp_path_to_send_mail_1; 
                if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                    $string = $MAIL->path_to_send_mail; 
                    if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($obj->email, $obj->civility . " " . $obj->first_name . " " . $obj->last_name);
            }
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            $subject = str_replace("{date}",date('Y-m-d'),$subject);
            $subject = str_replace("{time}",date('H:i:s'),$subject);
            if(!empty($module)){
                $subject = str_replace("{department_name}",$module[0],$subject);
            }else{
                $subject = str_replace("{department_name}","",$subject);
            }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            $emailMessage = str_replace("{date}",date('Y-m-d'),$emailMessage);
            $emailMessage = str_replace("{time}",date('H:i:s'),$emailMessage);
            if(!empty($module)){
                $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            }
            $mail->Body    = $emailMessage;
            if($attachment != ""){
                $attachment = explode(",", $attachment);
                foreach ($attachment as $at) {
                    $mail->addAttachment("uploads/attachment/".$at, $at);
                }
            }
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }
}

function supportSendReply($obj, $subject, $message, $type = "contact", $MAIL=null, $module=array(),$newsletter_test=array(),$attachment="",$reply_link=""){
    $CI        = &get_instance();
    require_once(APPPATH."third_party/phpmailer/Exception.php");
    require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
    require_once(APPPATH."third_party/phpmailer/SMTP.php");
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $emailMessage = nl2br($message) . "<br>";
    $emailMessage .= "Click <a href='".$reply_link."'>here</a> to reply.<br>";

    $emailMessage .= "<h4 style='color: #000'>HANDI EXPRESS SAS<br>";
    $emailMessage .= "Service secrétariat</h4>";
    $emailMessage .= "<p><b>Siteweb : </b>www.handi-express.fr</p>";
    $emailMessage .= "<p><b>Email : </b>direction@handi-express.fr</p>";
    $emailMessage .= "<p><b>Tél : </b>01 48 13 09 34</p>";
    $emailMessage .= "<p><b>Fax : </b>01 83 62 84 04</p>";
    $emailMessage .= "<p><b>Adresse : </b>du siège social : 48-50 Avenue d'Enghien 93800 Epinay sur seine</p>";

    if($MAIL == null || empty($MAIL)){
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host     = 'tls://smtp.office365.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            $mail->addReplyTo($replyTo, 'Handi Express');
            $mail->Username = 'direction@handi-express.fr';                 // SMTP username
            $mail->Password = 'Hanouf77';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('direction@handi-express.fr', 'Handi Express');
            /*if(!empty($newsletter_test)){
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $mail->addAddress($obj->email, $obj->p_title . " " . $obj->fname . " " . $obj->lname);
            }*/
            
            if(!empty($newsletter_test)){
                $string = $MAIL->smtp_path_to_send_mail_1; 
                if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $string = $MAIL->path_to_send_mail; 
                    if($string != ""){
                    $str_arr = explode (";", $string);
                    foreach ($str_arr as $val) {
                        if($val != ""){
                            $mail->addAddress($val, "Handi Express");
                        }
                    }
                }
                $mail->addAddress($obj->email, $obj->p_title . " " . $obj->fname . " " . $obj->lname);
            }
			
			if($obj->department == 10){
				$mod = 'Booking service';
			}elseif($obj->department == 11){
				$mod = 'Clients Service';
			}elseif($obj->department == 12){
				$mod = 'Driver Service';
			}elseif($obj->department == 13){
				$mod = 'Accounting Service';
			}elseif($obj->department == 14){
				$mod = 'Sales Department';
			}elseif($obj->department == 15){
				$mod = 'Technical Service';
			}elseif($obj->department == 16){
				$mod = 'Disclaimer Service';
			}
			
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            $subject = str_replace("{date}",from_unix_date($obj->created_at),$subject);
            $subject = str_replace("{time}",from_unix_time($obj->created_at),$subject);
            if(!empty($module)){
                $subject = str_replace("{department_name}",$module[0],$subject);
            }else{
                $subject = str_replace("{department_name}","",$subject);
            }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            $emailMessage = str_replace("{date}",from_unix_date($obj->created_at),$emailMessage);
            $emailMessage = str_replace("{time}",from_unix_time($obj->created_at),$emailMessage);
            if(!empty($module)){
                $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            }
            $mail->Body    = $emailMessage;
            if($attachment != ""){
                $attachment = explode(",", $attachment);
                foreach ($attachment as $at) {
                    $mail->addAttachment("uploads/attachment/".$at, $at);
                }
            }
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }else{
        try {
            //$mail->isSMTP();                                      // Set mailer to use SMTP
            if(!empty($newsletter_test)){
                $mail->Host     = $MAIL->smtp_host_1;  // Specify main and backup SMTP servers
            }else{
                $mail->Host     = $MAIL->smtp_host;  // Specify main and backup SMTP servers
            }
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';                           // Enable SMTP authentication
            $replyTo = $type == "job" ? 'direction@handi-express.fr' : 'contact@handi-express.fr';
            if(!empty($newsletter_test)){
                if($MAIL->smtp_send_copy_to_sender_1 == 1){
                    $mail->addReplyTo($replyTo, $MAIL->smtp_name_1);
                }
            }else{
                if($MAIL->send_copy_to_sender == 1){
                    $mail->addReplyTo($replyTo, $MAIL->name);
                }
            }
            if(!empty($newsletter_test)){
                $mail->Username = $MAIL->smtp_user_1;                 // SMTP username
                $mail->Password = $MAIL->smtp_password_1;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port_1;                                    // TCP port to connect to
            }else{
                $mail->Username = $MAIL->smtp_user;                 // SMTP username
                $mail->Password = $MAIL->smtp_password;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $MAIL->smtp_port;                                    // TCP port to connect to
            }
            //Recipients
            if(!empty($newsletter_test)){
                $mail->setFrom($MAIL->smtp_user_1, $MAIL->smtp_name_1);
            }else{
                $mail->setFrom($MAIL->smtp_user, $MAIL->name);
            }
            if(!empty($newsletter_test)){
                $mail->addAddress($newsletter_test[0], "Handi Express");
            }else{
                $mail->addAddress($obj->email, $obj->p_title . " " . $obj->fname . " " . $obj->lname);
            }
			if($obj->department == 10){
				$mod = 'Booking service';
			}elseif($obj->department == 11){
				$mod = 'Clients Service';
			}elseif($obj->department == 12){
				$mod = 'Driver Service';
			}elseif($obj->department == 13){
				$mod = 'Accounting Service';
			}elseif($obj->department == 14){
				$mod = 'Sales Department';
			}elseif($obj->department == 15){
				$mod = 'Technical Service';
			}elseif($obj->department == 16){
				$mod = 'Disclaimer Service';
			}
			
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $subject = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$subject);
            $subject = str_replace("{user_name}",$CI->session->userdata('user')->username,$subject);
            $subject = str_replace("{date}",from_unix_date($obj->created_on),$subject);
            $subject = str_replace("{time}",from_unix_time($obj->created_on),$subject);
            $subject = str_replace("{department_name}",'support',$subject);
			// if(!empty($module)){
                // $subject = str_replace("{department_name}",$module[0],$subject);
            // }
            $mail->Subject = $subject;
            $emailMessage = str_replace("{sender_name}",$CI->session->userdata('user')->first_name." ".$CI->session->userdata('user')->last_name,$emailMessage);
            $emailMessage = str_replace("{user_name}",$CI->session->userdata('user')->username,$emailMessage);
            $emailMessage = str_replace("{date}",from_unix_date($obj->created_on),$emailMessage);
            $emailMessage = str_replace("{time}",from_unix_time($obj->created_on),$emailMessage);
            $emailMessage = str_replace("{support_status}",$obj->status,$emailMessage);
            $emailMessage = str_replace("{department_name}",'support',$emailMessage);
			// if(!empty($module)){
                // $emailMessage = str_replace("{department_name}",$module[0],$emailMessage);
            // }
            $mail->Body    = $emailMessage;
            if($attachment != ""){
                $attachment = explode(",", $attachment);
                foreach ($attachment as $at) {
                    $mail->addAttachment("uploads/attachment/".$at, $at);
                }
            }
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true        
                )
            );
            $check = $mail->send();
            return [
                'status' => true,
                'message' => 'Message sent'
            ];
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            return [
                'status' => false,
                'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo
            ];
        }
    }
}

function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


function dayDiff($date,$alert_before_day){
    $expiry_time = new DateTime($date);
    $current_date = new DateTime();
    $diff = $expiry_time->diff($current_date);
    return $diff->days <= $alert_before_day ? "background:#fbb;":"";
}

function vdebug($data){
            echo "<pre>";
        var_dump($data);
echo $this->db->last_query();
       die;
}