<?php


class Mail_sender
{
    private $config = [];
    public function __construct()
    {
        $this->config = get_configuration();
    }

    public function __get($var){
        return get_instance()->$var;
    }

    public function sendMail($data, $content = false){

        require_once(APPPATH."third_party/phpmailer/Exception.php");
        require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
        require_once(APPPATH."third_party/phpmailer/SMTP.php");

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host     = $this->config['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->CharSet  = 'UTF-8';
            if(isset($data['reply_email']))
                $mail->addReplyTo($data['reply_email']);
            else
                $mail->addReplyTo('contact@handi-express.fr', 'Handi Express');

            $mail->Username = $this->config['SMTP_USERNAME'];
            $mail->Password = $this->config["SMTP_PASSWORD"];
            $mail->SMTPSecure = $this->config["SMTP_SSL"] == 1 ? "ssl" : 'tls';
            $mail->Port = $this->config['SMTP_PORT'];
            //Recipients
            $mail->setFrom($this->config['SMTP_USERNAME'], 'Handi Express');

            //Content
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];
            $mail->Body = $content != false ? $content : $this->load->view($data['view'], ['data' => $data['data']], true);

            if(is_array($data['email'])) {
                foreach ($data['email'] as $email)
                    $mail->addAddress($email);
            } else $mail->addAddress($data['email']);

            return $mail->send();
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            $msg['errors'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;;
            $msg['msg'] = "La connexion a échoué";
            return $msg;
        }
    }
}