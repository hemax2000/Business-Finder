<?php
session_start();
if(!isset($_SESSION['login']))
    header("location:login.php");
	else{
$us=$_SESSION['login'];
include_once("Connect.php");
if(!empty($_POST['submit'])){
	if(!(empty($_POST['name'])||empty($_POST['des'])||empty($_POST['poster'])||empty($_POST['type']))){
$name=$_POST['name'];
$des=$_POST['des'];
$urt=$_POST['poster'];
$type=$_POST['type'];

$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(id) FROM idea"));
$i=$id['MAX(id)']+1;
mysqli_query($con,"INSERT INTO idea VALUES ($i,'$name','$des','$urt','$type','$us')");
mysqli_close($con);
header("location:add idea.php?success=Idea posted");
}

else{
mysqli_close($con);
header("location:add idea.php?error=All feild required");
}
}
if(!empty($_POST['reset'])){
	header("location:add idea.php?success=Canceled");
}
	}
?>

<!DOCTYPE html>
<html lang="en";
>
	<head>
	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

      
		<title>RatedTV | Home</title>
		<link rel="stylesheet" href="style.css">
	</head>

    <div class="back">	
        <?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?></div>
	<body >


		<div id="site-content"> 
			<header class="site-header">
				<div class="container">
					<a href="Home-A.php" id="branding">
						
						<div class="logo-copy">
							<h1 class="site-title">BF</h1>
							<small class="site-description">BFW</small>
						</div>
					</a> <!-- #branding -->

					
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="Home.php">Home</a></li>
							<li class="menu-item current-menu-item"><a href="add%20idea.php">Post idea</a></li>
                            <li class="menu-item"><a href="Search.php">Search</a></li>
							<li class="menu-item"><a href="logout.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>
				
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">

						</div>
                        <form method="POST">
                            Name of the idea:  <input type="text" placeholder="" style="background-color: #131a20; color: aliceblue;margin:20px;" name="name">
                            <br>
							
							Type of busniess:
                            <select name='type' style="background-color: #131a20; color: aliceblue;margin:20px;">
                            <option>Medical</option>  
                            <option>Educational</option>  
                            <option>Entertainment</option>
                            <option selected>General</option>
                            </select>
                            <br>
						   Description: 
                              <br>
                            <textarea rows="10" cols="120"style="background-color: #131a20;color: aliceblue; " name= "des" >
                                
                            </textarea>
                            <br><br>
							 URL of image: <br>
                            
                          
					<input type="text" placeholder="e.g https://static.dw.com/image/18686404_101.jpg" style="background-color: #131a20;color: aliceblue;" name ="poster" >
                           <br><br>  
                            <br><br>
                            <input name="submit" type ="submit" style="background:green;" class="btn btn-info" value="Send"></input>
 </form>

						<div class="movie-list">
							
							        
								</div>

							</div>
							
						</div> <!-- .movie-list -->

						
					</div>
				</div> <!-- .container -->
			</main>
		
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
		
		
	</body>


</html>