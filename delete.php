<?php
include_once('Connect.php');

if(!empty($_GET['id'])){
$id=$_GET['id'];
mysqli_query($con,"DELETE FROM idea WHERE id=$id");
mysqli_close($con);
header("location:profile.php?success=idea deleted");
}
?>