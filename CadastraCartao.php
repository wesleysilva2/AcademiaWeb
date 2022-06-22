<?php include('server.php') ?>
<?php 
  //session_start(); 
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
  <title>Cadastro Cartão</title>
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
  	<h2>Cadastre-se</h2>
  </div>
	
  <form method="post" action="CadastraCartao.php">
  	<?php include('errors.php'); ?>
      <div>
        <p> <a href="paginaUser.php" style="color: purple;">PAGINA DE USUARIO</a> </p>
      </div>
      <br><br>
  	<div class="input-group">
  	  <label>Titular do Cartão</label>
  	  <input type="text" name="username" readonly="readonly" value="<?php echo $_SESSION['username']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Numero Do Cartão</label>
  	  <input type="number" name="numCard" value="<?php echo $numCard; ?>">
  	</div>
    <div class="input-group">
  	  <label>Data de Validade</label>
  	  <input type="month" name="cardVal" value="<?php echo $cardVal; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_card">Cadastrar Cartão</button>
  	</div>
  </form>
</body>
</html>