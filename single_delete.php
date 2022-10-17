<?php

include_once('Connect.php');
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
if(!empty($_GET['id'])){
	$id=$_GET['id'];
	$idea=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM idea WHERE id=$id"));
	$userId=$_SESSION['login'];
    $user=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE userId=$userId"));
	
	
	
}
if (!(empty($_POST['delete'])))
    header("location:delete.php?id=$id");
}
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		
		<title>RatedTV | Rate</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
<style>

#rating *{
    margin: 0;
    padding: 0;
}
#rating .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
#rating .rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
#rating .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:gray;
	
}
#rating .rate:not(:checked) > label:before {
    content: '★ ';
	
}
#rating .rate > input:checked ~ label {
    color: #ffc700;    
}
#rating .rate:not(:checked) > label:hover,
#rating .rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
#rating.rate > input:checked + label:hover,
#rating .rate > input:checked + label:hover ~ label,
#rating .rate > input:checked ~ label:hover,
#rating .rate > input:checked ~ label:hover ~ label,
#rating .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
	</head>

<div class="back"></div>
	<body>
		

		<div id="site-content">
			<header class="site-header">
	     
				<div class="container">
					<a href="Home.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">RTV</h1>
							<small class="site-description">RatedTV</small>
						</div>
					</a> <!-- #branding -->
                  <div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item "><a href="Home.php">Home</a></li>
							<li class="menu-item"><a href="Addmovie.php">Add movie</a></li>
							<li class="menu-item"><a href="Search.php">Search</a></li>
                            <li class="menu-item" ><a href="logout.php"><span style="color:#ef5350;">Logout</span></a></li>
                            <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>

					
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
                            <!--deleted-->
						</div>

						<div class="content">
							<div class="row">
								
									<figure class="movie-poster"><img width='500' src="<?php  echo $idea['image'];?>" alt="#"></figure>
								
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $idea['name'] ?></h2>
									<div class="movie-summary">
										<strong>description:</strong>
										<p><?php  echo $idea['discerption']; ?> </p>
									</div>
									<ul class="movie-meta">
										
										<!-- <li><strong>Length:</strong> 98 min</li> -->
										
										<li><strong>Type of the business:</strong> <?php echo $idea['type']; ?></li>
									</ul>
                                    <strong>Phone number:</strong>
										<p><?php  echo $user['phoneNumber']; ?> </p>
                                    
                                    <br><br>
                                     <form method="POST">
                                    <input name="delete" type="submit" class="btn btn-danger" value="Delete"></input>
                                    </form>
                                    
									<?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }
?> 
									
							</div>  <!-- .row -->
						
						</div>
						<div class="breadcrumbs">
                            <!--deleted-->
						</div>

</div>

					
				 
				</div> <!-- .container -->
			</main>
			
		</div>
		<!-- Default snippet for navigation -->
	



		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
	
    </div>
</html>
