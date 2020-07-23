<?php
$title = $_POST['title']; // get by post method
$fnm = $_POST['fnm'];
$lnm = $_POST['lnm'];
$cnm = $_POST['cnm'];
$caddress = $_POST['caddress'];
$state1 = $_POST['state1'];
$city1 = $_POST['city1'];
$zcode1 = $_POST['zcode1'];
$mob = $_POST['mob'];
$phone1 = $_POST['phone1'];
$email = $_POST['email'];
$nat = $_POST['nat'];
$products = $_POST['products'];
$ownership = $_POST['ownership'];
$other = $_POST['other'];
$message = $_POST['message'];



$con = mysqli_connect('localhost','root','','galtech'); 

$ins ="insert into dealership values('','".$title."','".$fnm."','".$lnm."','".$cnm."','".$caddress."','".$state1."','".$city1."','".$zcode1."','".$mob."','".$phone1."','".$email."','".$nat."','".$products."','".$ownership."','".$other."','".$message."')";



// mysql query('','".$name."','".$age."','".$email."','".$password."','".$gender."','".$phone."')";
//echo $fnm;
//if($ins){ // check success or not
//	
//	echo "inserted successfully";
//
//	}else {
//		echo "faild";
//		}

$res = mysqli_query($con,$ins);



$to = $email;
$subject = "My subject";
$txt = "Hello world!";
$headers = "priya@razorbee.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($title,$fnm,$lnm,$cnm,$caddress,$state1,$city1,$zcode1,$mob,$phone1,$email,$nat,$products,$ownership,$message);





 ?>




