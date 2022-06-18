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
    	<p> <a href="paginaUser.php?logout='1'" style="color: red;">Logout</a></p>
      <p> <a href="CadastraAcademia.php" style="color: blue;">Cadastrar Academias</a></p>
      <p> <a href="CadastraCursos.php" style="color: purple;">Cadastrar Cursos</a></p>
      <p> <a href="CadastraPlano.php" style="color: green;">Cadastrar Plano</a></p>
    <?php endif ?>
      <br><br><br>
    <div>
      <h3>Planos Cadastrados</h3>
      <br>
      <?php 
        $username = $_SESSION['username'];
        $sql = mysqli_query($db,"select planoCadastrado from usuarios where username = '$username'");
        while($row = mysqli_fetch_assoc($sql)){
        echo "<option>".$row['planoCadastrado']."</option>";
        }
      ?>
    </div>
    <br>
    <div>
      <h3>Cursos Cadastrados</h3>
      <br>
      <?php 
        $username = $_SESSION['username'];
        $sql = mysqli_query($db,"select cursosCadastrados from usuarios where username = '$username'");
        while($row = mysqli_fetch_assoc($sql)){
        echo "<option>".$row['cursosCadastrados']."</option>";
        }
      ?>
    </div>
    <br>
    <div>
    <h3>Academia Cadastrada</h3>
    <br>
    <?php 
      $username = $_SESSION['username'];

      $sqlAcad = mysqli_query($db,"select academiaCadastrada from usuarios where username = '$username'");   
      while($row = mysqli_fetch_assoc($sqlAcad)){
      echo "<option>".$row['academiaCadastrada']."</option>";
      }
    ?>
    <?php 
      $username = $_SESSION['username'];

      $sqlAcad = mysqli_query($db,"select academiaCadastrada from usuarios where username = '$username'");

      while ($row = $sqlAcad->fetch_assoc()) {
        $name = $row['academiaCadastrada'];
        $sqlEnder = mysqli_query($db,"select endereco from academias where nomeAcademia = '$name'");
        while ($row = $sqlEnder->fetch_assoc()) {
          echo $row['endereco']."<br>";
        }
      }
    ?>
    </div>
</div>
</body>
</html>