<?php

App::uses('Component', 'Controller');

class CommonComponent extends Component {
    /*
     * Send Email via SMTP Gmail server
     */

function sendMail($email,$from ,$subject,$Body,$sitename,$to){

       App::import('Vendor', 'phpmailer', array(
              'file' => 'phpmailer/class.phpmailer.php'));  
       
        $mail = new PHPMailer();

        $body = preg_replace('/\[\]/','',$Body);
        
        $mail->SetFrom($from);

        $mail->AddReplyTo($from);

        $address = $email;
        
       $mail->AddAddress($address);
       // $mail->AddReplyTo($to,$sitename);
       // $mail->AddAddress($to, $sitename);
        $mail->Subject    = $subject;

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);

        if(!$mail->Send()) {
          return $mail->ErrorInfo;  
        } else {
         return "Success";
        }
      
    }
function signtemplate($userName,$email){
    $body = '<div style="font-size:15px;font-family:georgia,serif;line-height:1.3em">';

        $body .=  'Mr: '.$userName.'<br><br>';
         $body .=  'Thank you for registering JTC.<br><br>';
          $body .=  'Regards,<br>';

        $body .= 'JTC Team';
        $body .=  '</div>';
       return $body;
       }

   
       
    function contacttemplate($from,$userName,$c_name,$phone,$comment){
        
        $body = '<div style="font-size:15px;font-family:georgia,serif;line-height:1.3em">';

        $body .= 'Name: ' . $userName . '<br><br>';
        $body .= 'Company Name: ' . $c_name . '<br><br>';
        $body .= 'Phone Number: ' . $phone . '<br><br>';
        $body .= 'Email: ' . $from . '<br><br>';
        $body .= 'Enquiry: ' . $comment . '<br><br>';
        $body .= '</span></a><br><br>';
        $body .= 'Regards,<br>';
        $body .= $userName;
        $body .= '</div>';
        return $body;
       }
       function sendReturnMail($email2,$from ,$subject,$Body,$sitename,$to){

       App::import('Vendor', 'phpmailer', array(
              'file' => 'phpmailer/class.phpmailer.php'));  
       
        $mail = new PHPMailer();

        $body = preg_replace('/\[\]/','',$Body);
        
        $mail->SetFrom($from);

        $mail->AddReplyTo($from);

        $address = $email2;
        
       $mail->AddAddress($address);
       // $mail->AddReplyTo($to,$sitename);
       // $mail->AddAddress($to, $sitename);
        $mail->Subject    = $subject;

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);

        if(!$mail->Send()) {
          return $mail->ErrorInfo;  
        } else {
         return "Success";
        }
      
    }
    
    function producttemplate($userName,$email,$order,$date,$product,$com,$name1,$address,$country,$com1,$name2,$address1,$country1){
    $body = '<div style="font-size:15px;font-family:georgia,serif;line-height:1.3em">';
    $body .=  'Hello '.$userName.'<br><br>';
    $body .=  'We thought you would like to know that we have dispatched your item(s). Your order is on the way.<br>';
    $body .='Order Number: '.$order.'<br>' ;
    $body .='Date Ordered : '.$date.'<br><br>' ;
    $body.='Products<br>';
    $body .=''.$product.'<br>' ;
    //$body .='Total Price : £ '.$price.'<br><br>';
    $body.='Shipping Address<br>';
    $body .=  ''.$com1.'<br>';
    $body .=  ''.$name2.'<br>';
    $body .=  ''.$address1.'<br>';
    $body .=  ''.$country1.'<br><br>';
    $body.='Billing Address<br>';
    $body .=  ''.$com.'<br>';
    $body .=  ''.$name1.'<br>';
    $body .=  ''.$address.'<br>';
    $body .=  ''.$country.'<br><br>';
    $body .=  'Regards,<br>';
    $body .= 'JTC Team';
    $body .=  '</div>';
       return $body;
       }
    

    }

?>
