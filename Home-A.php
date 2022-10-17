<?php
/*session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
include_once('Connect.php');
$movies=mysqli_query($con,"SELECT * FROM  movies  WHERE Accept=0");
mysqli_close($con);
	}*/
?>

<!DOCTYPE html>
<html lang="en";
>
	<head>
	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

      
		<title>Home</title>
		<link rel="stylesheet" href="style.css">
	</head>

    <div class="back"></div>
	<body >


		<div id="site-content"> 
			<header class="site-header">
				<div class="container">
					<a href="Home-A.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">BF</h1>
							<small class="site-description">BFW</small>
						</div>
					</a> <!-- #branding -->

					
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="Home-A.php">Home</a></li>
							<li class="menu-item m"><a href="">Add movie</a></li>
							<li class="menu-item"><a href="logout.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item"><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>
				
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">

						</div>
						<div class="movie-list">
							<?php 
							while($movie=mysqli_fetch_assoc($movies)){
								
									$poster=$movie['poster'];
								
							?>
							<div class="movie">
								<figure class="movie-poster"><img src= "<?php echo $poster?>" alt="#"></figure>
								<div class="movie-title">
									
							<a href="single-A.php?id=<?php echo $movie['movieId'];?>" ><?php echo $movie["title"];?></a>
							        
								</div>

							</div>
							
<?php }; ?>

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