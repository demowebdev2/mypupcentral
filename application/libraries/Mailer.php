<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailer {

  

    public function __construct() {
        $this->CI = & get_instance();
        require_once('PHPMailer/PHPMailerAutoload.php');
    }

    public function send_mail($toemail, $subject, $body) {
        
        
        //   $header = "From:no-reply@mypupcentral.com \r\n";
        //         $header .= "MIME-Version: 1.0 \r\n";
        //         $header .= "Content-type: text/html;charset=UTF-8 \r\n";
        //  $retval = mail ('iamashishn@gmail.com',$subject,$body,$header);
        // //  echo json_encode( $retval);
        // //  exit();
        //  if( $retval == true ) {
        //     return TRUE;
        //  }else {
        //      return FALSE;
        //  }
         
         

        $mail = new PHPMailer();
       

            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure ='tls';
            $mail->Host = 'tls://email-smtp.us-east-2.amazonaws.com';
            $mail->Port = 587;
            // $mail->SMTPDebug  = 1;            
            $mail->Username = 'AKIA4OZ37DTQEAF53M4E';
            $mail->Password = 'BP7hHHuDp4dbKJNR4gQKQ+HhdnpnPoRCRCjtrCPaZBzx';
        
         $mail->SetFrom('info@mypupcentral.com');
      // $mail->AddReplyTo($this->CI->mail_config->smtp_username, $this->CI->mail_config->smtp_username);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;
        $mail->AddAddress($toemail);
    //   echo json_encode($mail->Send());
    //   exit();
        if ($mail->Send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 

}
