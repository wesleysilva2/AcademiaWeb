<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Cadastro Movimento FIT</title>
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
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nome de Usuario</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Senha</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmar Senha</label>
  	  <input type="password" name="password_2">
  	</div>

      <div class="input-group">
  	  <label>Upload imgage</label>
  	<input type="file" id="img" name="img" accept="image/*">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Ja é Membro? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>