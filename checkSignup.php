<?php
session_start();
include("Connect.php");

$semail='semail';
$suser='suser';
$spass='spass';
$respass='srepass';

if(!( empty($_POST['suser']) || empty($_POST['semail']) || empty($_POST['spass']) || empty($_POST['srepass']))){
$semail=$_POST['semail'];
$suser=$_POST['suser'];
$spass=$_POST['spass'];
$respass=$_POST['srepass'];
    echo strlen($spass);
    
    $result=mysqli_query($con,"SELECT * from users where email='$semail'");
    if(mysqli_num_rows($result)>0){
            header("location:login.php?error=Email already used");
    }
    else{
        if(strlen($spass)<8){
            header("location:register.php?error=Password should be more than 8 charactars");
        
        }else{
        if($spass==$respass){
           
            $count=(mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(userId) FROM users")));
            $id= $count['MAX(userId)']+1;
            $_SESSION['login']= $id;
            mysqli_query($con," INSERT INTO users VALUES ('$id','$semail','$spass','$suser','','','') ");
            header("location:profile_edit.php");

            }else{header("location:register.php?error=Passwords dont match");
                 }
                   
    }
}
}
else{
     header("location:register.php?error=All feild required");
    }
mysqli_close($con);
?>