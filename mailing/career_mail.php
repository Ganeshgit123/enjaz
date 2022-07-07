<?php

$name=post("name");
$email=post("email");
$phone=post("phone");
$file=post("file");
$msg=post("msg");

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($file_tmp,"../upload/".time().$file_name);

$file = $_FILES['file']['name'];
$doc_name = addslashes($_FILES['file']['name']);
$image_name = addslashes(time().$_FILES['file']['name']);

$subject = "Career Form";

$to = "liai.ganeshkumar@gmail.com";
$from ="noreplyliaorg@gmail.com";

//echo "".$name. "/n".$email."/n".$phone."/n".$smessage1."";
//$message = " ".$name. " \r\n ".$email." \r\n ".$phone." \r\n".$msg." ";
$message ="Resume : <a href='https://enjaz-company.com.sa/upload/".$image_name."'>Click Here</a>";
 
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

mail($to,$subject,$message1,$message,$headers);

	echo "<script> location.href='../career'; </script>";  
  exit;

function post($input){
    return($_POST[$input]);
}

?>