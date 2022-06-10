<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Movimento FIT</title>
  <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
  <link rel="stylesheet" href="css/general.css" />
</head>
<body>
	<main>
		<div class="header">
		<a href="index.html">
        <img
          class="logo"
          src="img/Movimento Fit Logo.png"
          alt="MovimentoFit Logo"
        />
      </a>
		<h2>Login</h2>
		</div>
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Nome de Usuario</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Senha</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Ainda não é membro? <a href="register.php">Cadastre-se</a>
		</p>
	</form>
	</main>
</body>
</html>