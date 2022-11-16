<?php
// echo 11; die;
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";die;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_FORWARDED'])) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    } else if(isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = 'UNKNOWN';
	}
$command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$localIP = exec ($command);
	
if($_POST['contact_email'] != "") {

$mail = new PHPMailer();

// Array
// (
//     [contact_name] => sdegt
//     [contact_email] => ss@gm.com
//     [contact_message] => deerf
// )

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "md-in-44.webhostbox.net";  // specify main and backup server
// $mail->Host = "mail.themodernfamilyshow.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mfs@brandastronauts.com";  // SMTP username
$mail->Password = "3Yv(c5A]#HFv"; // SMTP password
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to 
$mail->Port = 465;
$mail->From = ("mfs@brandastronauts.com");//$_POST['EMAIL'], $_POST['FNAME']
$mail->FromName = "Enquiry - The Modern Family Show";
$mail->IsHTML(true);                                  // set email format to HTML


    //First EMail - to Company
    // $mail->AddAddress("siddheshjaitapkar21@gmail.com", "Siddhesh Jaitapkar");
    $mail->AddAddress("rupalij11@gmail.com", "Rupali");
    // $mail->AddAddress("mike@themodernfamilyshow.com", "Mike");
    $mail->AddReplyTo($_POST['contact_email'], $_POST['contact_name']);
    $subject = "Enquiry - The Modern Family Show";

    $message = "<html> <head> <title>Enquiry - The Modern Family Show</title> </head> <body> <h3> <b>Enquiry - The Modern Family Show</b><br/><br/> Hi,<br/> We got an Enquiry<br/> ".$_POST['contact_name']." requested for more info on <i>themodernfamilyshow.com</i></h3> <table style='border: 1px solid black;border-collapse: collapse;font-size:16px;'> <tr style='color:#000;'> <td style='border: 1px solid black;padding:15px;'>Name</td> <td style='border: 1px solid black;padding:15px;'>".$_POST['contact_name']."</td> </tr> <tr style='color:#000;'> <td style='border: 1px solid black;padding:15px;'>E-Mail</td> <td style='border: 1px solid black;padding:15px;'>".$_POST['contact_email']."</td> </tr> <tr style='color:#000;'> <td style='border: 1px solid black;padding:15px;'>Additional Info</td> <td style='border: 1px solid black;padding:15px;'>".$_POST['contact_message']."</td> </tr> <tr style='color:#000;'> <td style='border: 1px solid black;padding:15px;'>IP</td> <td style='border: 1px solid black;padding:15px;'>".$ip."</td> </tr> </table> </body> </html> ";

    $mail->Subject = $subject;
    $mail->Body    = $message;
	// print_r($mail);
    $mail->Send();



$mail->ClearAddresses();  // each AddAddress add to list
$mail->ClearCCs();
$mail->ClearBCCs();

//Second EMail
/*
$mail->FromName = "Mailer - The Modern Family Show";
$message = '<html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <meta name="format-detection" content="telephone=no" /> <style type="text/css"> a img,img{outline:0;text-decoration:none}h1,h2,h3{font-style:normal}#bodyCell,#bodyTable,body{height:100%!important;margin:0;padding:0;width:100%!important;font-family:Helvetica,Arial,"Lucida Grande",sans-serif}.flexibleImage,a img,img{height:auto}table{border-collapse:collapse}table[id=bodyTable]{width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:400}a img,img{border:0;line-height:100%}a{text-decoration:none!important;border-bottom:1px solid}h1,h2,h3,h4,h5,h6{color:#5F5F5F;font-weight:400;font-family:Helvetica;font-size:20px;line-height:125%;text-align:Left;letter-spacing:normal;margin:0 0 10px;padding:0}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td,h1,h4{line-height:100%}.ExternalClass,.ReadMsgBody{width:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic;display:block}a,blockquote,body,li,p,table,td{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;font-weight:400!important}h1,h2,h3,h4{font-weight:400;display:block}.ExternalClass td[class=ecxflexibleContainerBox] h3{padding-top:10px!important}h1{font-size:26px}h2{font-size:20px;line-height:120%}h3{font-size:17px;line-height:110%}h4{font-size:18px;font-style:italic}.linkRemoveBorder{border-bottom:0!important}table[class=flexibleContainerCellDivider]{padding-bottom:0!important;padding-top:0!important}#bodyTable,#emailFooter,#emailHeader,body{background-color:#000000}#emailBody{background-color:#FFF}.textContent,.textContentLast{color:#8B8B8B;font-family:Helvetica;font-size:16px;line-height:125%;text-align:Left}.textContent a,.textContentLast a{color:#205478;text-decoration:underline}.nestedContainer{background-color:#F8F8F8;border:1px solid #CCC}.emailButton{background-color:#205478;border-collapse:separate}.buttonContent{color:#FFF;font-family:Helvetica;font-size:18px;font-weight:700;line-height:100%;padding:15px;text-align:center}.emailCalendarDay,.emailCalendarMonth{font-family:Helvetica,Arial,sans-serif;font-weight:700;text-align:center}.buttonContent a{color:#FFF;display:block;text-decoration:none!important;border:0!important}.emailCalendar{background-color:#FFF;border:1px solid #CCC}.emailCalendarMonth{background-color:#205478;color:#FFF;font-size:16px;padding-top:10px;padding-bottom:10px}.emailCalendarDay{color:#205478;font-size:60px;line-height:100%;padding-top:20px;padding-bottom:20px}.imageContentText{margin-top:10px;line-height:0}.imageContentText a{line-height:0}#invisibleIntroduction{display:none!important}span[class=ios-color-hack] a{color:#275100!important;text-decoration:none!important}span[class=ios-color-hack2] a{color:#205478!important;text-decoration:none!important}span[class=ios-color-hack3] a{color:#8B8B8B!important;text-decoration:none!important}.a[href^=tel],a[href^=sms]{text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important}.mobile_link a[href^=tel],.mobile_link a[href^=sms]{text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important}@media only screen and (max-width:480px){body,table[class=emailButton],table[class=flexibleContainer],table[id=emailHeader],table[id=emailBody],table[id=emailFooter]{width:100%!important}body{min-width:100%!important}td[class=flexibleContainerBox],td[class=flexibleContainerBox] table{display:block;width:100%;text-align:left}img[class=flexibleImage],td[class=imageContent] img{height:auto!important;width:100%!important;max-width:100%!important}img[class=flexibleImageSmall]{height:auto!important;width:auto!important}table[class=flexibleContainerBoxNext]{padding-top:10px!important}td[class=buttonContent]{padding:0!important}td[class=buttonContent] a{padding:15px!important}} </style> </head> <body bgcolor="#000000" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <center style="background-color:#000000;"> <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;"> <tr> <td align="center" valign="top" id="bodyCell"> <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody"> <tr> <td align="center" valign="top" bgcolor="#000000"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer"> <tr> <td valign="top" width="500" class="flexibleContainerCell"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top" class="flexibleContainerBox"> <table border="0" cellpadding="0" cellspacing="0" style="max-width:100%;"> <tr> <td align="left" class="textContent"> <img src="http://themodernfamilyshow.com/assets/images/logo.svg" width="180" class="flexibleImageSmall" style="max-width:100%;" alt="The Modern Family Show" title="Text" /> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#28b866"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer"> <tr> <td align="center" valign="top" width="500" class="flexibleContainerCell"> <table border="0" cellpadding="30" cellspacing="0" width="100%"> <tr> <td align="center" valign="top" class="textContent"> <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:25px;font-weight:normal;margin-bottom:5px;text-align:center;">Greetings from The Modern Family Show</h1> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer"> <tr> <td align="center" valign="top" width="500" class="flexibleContainerCell"> <table border="0" cellpadding="30" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td valign="top" class="textContent" style="padding-top:30px; padding-bottom:30px;"> <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Hi '.$_POST['contact_name'].',</h3> <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">Thank you for your interest. We will get back to you soon.</div> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr style="background-color:#666"> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer"> <tr> <td align="center" valign="top" width="500" class="flexibleContainerCell"> <table border="0" cellpadding="30" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td valign="top" class="textContent"> <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#fff;line-height:135%;">The Modern Family Show</div> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr>  <table bgcolor="#000000" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer"> <tr> <td align="center" valign="top" width="500" class="flexibleContainerCell"> <table border="0" cellpadding="30" cellspacing="0" width="100%"> <tr> <td valign="top" bgcolor="#000000"> <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;"> <div>Copyright &#169; 2022 <a href="http://www.themodernfamilyshow.com" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;">The Modern Family Show</span></a>. All&nbsp;rights&nbsp;reserved.</div> </div> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </center> </body> </html>'; 
	
    $mail->AddAddress($_POST['contact_email'],  $_POST['contact_name']);
	$mail->AddBCC("rupalij11@gmail.com",  "Rupali");

	$mail->Subject = $subject;
	$mail->Body    = $message;

	$mail->Send();
*/
    echo "Your form has been submitted successfully!!!";
	
} else {
	
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP

$mail->Host = "md-in-44.webhostbox.net";  // specify main and backup server
// $mail->Host = "mail.The Modern Family Show.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mfs@brandastronauts.com";  // SMTP username
$mail->Password = "3Yv(c5A]#HFv"; // SMTP password
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to 
$mail->Port = 465;

$mail->From = ("mfs@brandastronauts.com");//$_POST['EMAIL'], $_POST['FNAME']
$mail->FromName = "Alert - The Modern Family Show";
$mail->IsHTML(true);                                  // set email format to HTML


    //First EMail - to Company
    $mail->AddAddress("rupalij11@gmail.com", "Rupali");
    //$mail->AddReplyTo($_POST['contact_email'], $_POST['contact_name']);
    $subject = "Alert - The Modern Family Show - ".$ip;

    $message = "<html> <body> <h3> <b>Hit on Action Page - The Modern Family Show</b><br/><br/> Hi,<br/> Someone tried to hit action page.<br/> IP Address is ".$ip." and Local IP is ".$localIP.". </body> </html> ";

    $mail->Subject = $subject;
    $mail->Body    = $message;
	// print_r($mail);
    $mail->Send();

	$loc = "http://www.themodernfamilyshow.com";
	header("Location: $loc");
}
?>