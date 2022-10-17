<?php
session_start();
include_once("Connect.php");

$a="";


if(empty($_POST['email'])){
    header("location:forgetPwd.php?error=Both feild required");}
   else{
        $a = $_POST["email"];
        $res = mysqli_query($con,"SELECT * from users where email='$a'");
       
       
        if (mysqli_num_rows($res)>0){
            $userid=mysqli_fetch_object($res);
         $id=$userid->userId;
$receiver = "$a";
$subject = "Password reset !!";
$body = "Hi,click in the link: http://localhost/SWE444project/changePwd.php?id=$id";
$sender = "From:ab.mh1235@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    header("location:login.php?success=check your email");
}else{
    header("location:login.php?error=there have been some mistake sorry try again later");
}
        }
       else{
            header("location:forgetPwd.php?error=Email does not exsist please register");
        }
        
       }
    
mysqli_close($con);


?>