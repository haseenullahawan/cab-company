<?php
/**
 * Created by PhpStorm.
 * User: bilalblaxi
 * Date: 20/02/2018
 * Time: 19:35
 */
class PHPMailer_Library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once(APPPATH."third_party/phpmailer/Exception.php");
        require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
        require_once(APPPATH."third_party/phpmailer/SMTP.php");
        $objMail = new \PHPMailer\PHPMailer\PHPMailer(true);
        return $objMail;
    }
}