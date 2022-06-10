<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/styleLogin.css">
</head>
<body>

<div class="header">
	  <a href="index.html">	
        <img
          class="logo"
          src="img/Movimento Fit Logo.png"
          alt="MovimentoFit Logo"
        />
      </a>
	<h2>Pagina de Usuario</h2>
</div>
	Bem vindo a pagina de usuario
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Bem vindo <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="paginaUser.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>