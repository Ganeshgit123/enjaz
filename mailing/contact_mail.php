<?php 

$page=post("page");


$name=post("name");
$email=post("email");
$phone=post("phone");
$smessage1=post("message");

if($page=="home"){
$subject = post("page");
}else{
$subject = "Contact Form";
}


$to = "info@enjaz-company.com.sa";

//echo "".$name. "/n".$email."/n".$phone."/n".$smessage1."";
$message = " ".$name. " \r\n ".$email." \r\n ".$phone." \r\n".$smessage1." ";
 
mail($to,$subject,$message);

  if($page=="home"){
	echo "<script> location.href='https://enjaz-company.com.sa/'; </script>";
	}else{
   echo "<script> location.href='contact.php'; </script>";
   }
  
  exit;

function post($input){
    return($_GET[$input]);
}

?>