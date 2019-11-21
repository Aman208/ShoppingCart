



<?php 




if(isset($_POST['email'])&&isset($_POST["msg"]))
 {$email=$_POST['email'];
  $msg=$_POST['msg'];
  if($email!=""&&$msg!="")
    sendotp($email,$msg);

  } 

function mailtoemail($eMail,$message){

//mailing problem refer https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->Username = "webteamnitjsr5866@gmail.com";
$mail->Password = "webteam@nitjsr";

$mail->From = "webteamnitjsr5866@gmail.com";
$mail->FromName = "NITJSR CSE";
$mail->AddAddress($eMail);
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "BILL Receipt";
$mail->Body = "$message";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
if(!$mail->Send())
	echo $mail->ErrorInfo;


}

function sendotp($eMail,$msg){

  
$message="<h2>Dear customer thanku for Shopping<br>
YOUR TOTAL BILL IS :<br><span style='color:red;'>$$msg</span><br>
Keep Comming!!

</h2>";

mailtoemail($eMail,$message);

}

?>




