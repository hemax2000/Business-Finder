<?php 

session_start();
if(!isset($_SESSION['login']))
    header("location:login.php");
	else{
include_once('Connect.php');

        $ideas='';
         $i=0;
if (!(empty($_POST['submit'])) ){
    
	$tmp=$_POST['search']; 
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM idea WHERE name LIKE'%$tmp%'" ))>0){
        header("location:search.php?name=$tmp");}
        else{
    header("location:search.php?error=no idea have been found&name=$tmp");
        }
}elseif(!(empty($_GET['name'])) && strlen($_GET['name'])>=3){
    
    $ser=$_GET['name'];
    if(mysqli_query($con,"SELECT * FROM idea WHERE name LIKE'%$ser%'")){
    $ideas=mysqli_query($con,"SELECT * FROM idea WHERE name LIKE'%$ser%' LIMIT 9" );
        
    }
           
       
           
    
}elseif( isset($_GET['name']) &&strlen($_GET['name'])<3){ header("location:search.php?error=Write more than 3 letters please!"); }

        
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

    <div class="back"></div>
	<body >


		<div id="site-content"> 
			<header class="site-header">
				<div class="container">
					<a href="Home-A.php" id="branding">
						
						<div class="logo-copy">
							<h1 class="site-title">RTV</h1>
							<small class="site-description">RatedTV</small>
						</div>
					</a> <!-- #branding -->

					
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="Home.php">Home</a></li>
							<li class="menu-item"><a href="add%20idea.php">Post idea</a></li>
                            <li class="menu-item current-menu-item"><a href="Search.php">Search</a></li>
							<li class="menu-item"><a href="logout.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>
				
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
 <?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?>
						</div>
                        <form method="post">

<input class="btn btn-info" style="margin:8px" name="submit" type="submit" value="Search"> </input>
<input style="background-color:#131a20; color: aliceblue;" type="text" name="search" placeholder="Search..">
                            </form>
							<br><br>
						<div class="movie-list">
							<?php 
                            
                            
							
                               if(!(empty($ideas))){
                                
							while(($i<9)&&($idea=mysqli_fetch_assoc($ideas))) {
                                
									$moid=$idea['id'];
									
										$poster=$idea["image"];
										$tit=$idea["name"];
									
									
									
								?>	<div class="movie">
								<figure class="movie-poster"><img src="<?php echo $poster; ?>" alt="#"></figure>
								<div class="movie-title"><a href="single.php?id=<?php echo $moid; ?>"><?php echo $idea["name"]; ?></a></div>
								
								
								</div>
								<?php 
								$i++;
                                 
							
                                }}
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