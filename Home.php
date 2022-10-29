<?php 

session_start();
if(!isset($_SESSION['login']))
    header("location:login.php");
	else{
$id=$_SESSION['login'];
include_once('Connect.php');
$s =9;
                                                                                                           // here we put userId----------V
$ideas= mysqli_query($con,"SELECT * FROM idea");
$i=0;
	}
$poster='';
$tit='';
?>
<!DOCTYPE html>
<html lang="en";
>
	<head>
	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		

      
		<title>BF | Home</title>
		<link rel="stylesheet" href="style.css">
	</head>

    <div class="back"></div>
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
							<li class="menu-item current-menu-item"><a href="Home.php">Home</a></li>
							<li class="menu-item m"><a href="add%20idea.php">Post idea</a></li>
                            <li class="menu-item"><a href="search.php">Search</a></li>
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
						<div class="movie-list">
							<?php 
							
							while(($i<9)&&($idea=mysqli_fetch_assoc($ideas))) {
                                
									$moid=$idea['id'];
									
										$poster=$idea["image"];
										$tit=$idea["name"];
									
									
									
								?>	<div class="movie">
                                <a href="single.php?id=<?php echo $moid; ?>">
								<figure class="movie-poster"><img src="<?php echo $poster; ?>" alt="#"></figure>
								<div class="movie-title"><?php echo $idea["name"]; ?></a></div>
								
								
								</div>
								<?php 
								$i++;
							} 
                            
                            ?>
							
							

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
