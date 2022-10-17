<!DOCTYPE html>
<html>
<style>.login-dark {
  height:1000px;
  background:#475d62 url(../../assets/img/star-sky.jpg);
  background-size:cover;
  position:relative;
}

.login-dark form {
  max-width:320px;
  width:90%;
  background-color:#1e2833;
  padding:40px;
  border-radius:4px;
  transform:translate(-50%, -50%);
  position:absolute;
  top:50%;
  left:50%;
  color:#fff;
  box-shadow:3px 3px 4px rgba(0,0,0,0.2);
}



.login-dark form .form-control {
  background:none;
  border:none;
  border-bottom:1px solid #434a52;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
}

.login-dark form .btn-primary {
  background:#214a80;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none;
}

.login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
  background:#214a80;
  outline:none;
}

.login-dark form .forgot {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}



.login-dark form .btn-primary:active {
  transform:translateY(1px);
}

    .alert {
      position: relative;
      padding: 1rem 1rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: 0.25rem;
    text-align: center;
    }
    .alert-danger {
      color: #842029;
      background-color: #f8d7da;
      border-color: #f5c2c7;
    }.alert-danger .alert-link {
      color: #6a1a21;
    }
    .alert-success {
      color: #0f5132;
      background-color: #d1e7dd;
      border-color: #badbcc;
    }
    .alert-success .alert-link {
      color: #0c4128;
    }
</style>
<head>
    
    <title>Login in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="login-dark">
        <form action="checkforget.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="New password"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Repeat password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Reset Password</button></div>
            <a href="login.php" class="forgot">Back to login ?</a>
            
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
    </div>

</body>

</html>