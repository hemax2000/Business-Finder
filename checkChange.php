<?php
session_start();
include_once("Connect.php");

$a="";
$b="";
 $id=$_GET['id'];
if( empty($_POST['repassword']) ||  empty($_POST['password'])){
    header("location:changePwd.php?id=$id&error=both field required");}
   else{
        $a = $_POST["repassword"];
        $b= $_POST["password"];
      
       
       
        if(strlen($b)<8){
            header("location:changePwd.php?error=Password should be more than 8 charactars");
        
        }else{
        if($a==$b){
           
            $res = mysqli_query($con,"UPDATE users SET password='$b' where userId='$id'");
            header("location:login.php?success=Password changed");

            }else{header("location:changePwd.php?error=Passwords dont match");
        
       }}}
    
mysqli_close($con);
?>