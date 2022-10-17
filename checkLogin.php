<?php
session_start();
include_once("Connect.php");

$a="";
$b="";

if( empty($_POST['email']) ||  empty($_POST['password'])){
    header("location:login.php?error=Both feild required");}
elseif(empty($_POST['g-recaptcha-response'])){ header("location:login.php?error=Please Check captcha form");}
   else{
        $a = $_POST["email"];
        $b= $_POST["password"];
        $res = mysqli_query($con,"SELECT * from users where email='$a' AND password='$b'");
       
       
        if (mysqli_num_rows($res)>0){
            $userid=mysqli_fetch_object($res);
            
            $_SESSION['login']= $userid->userId;
            header("location:Home.php");
            
        }
       else{
            header("location:login.php?error=Invalid email or Password");
        }
        
       }
    
mysqli_close($con);
?>