<?php
session_start();

// Inicializando variaveis 
$username = "";
$email    = "";
$errors = array(); 

// Conectando com banco de dados
$db = mysqli_connect('localhost', 'root', '', 'movimentofit');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Nome de Usuario é requerido"); }
  if (empty($email)) { array_push($errors, "Email é requerido"); }
  if (empty($password_1)) { array_push($errors, "Senha é Requerida"); }
  if ($password_1 != $password_2) {
	array_push($errors, "As Senhas não são iguais");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM usuarios WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // Se usuario existe
    if ($user['username'] === $username) {
      array_push($errors, "Nome de Usuario ja Cadastrado");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email ja Cadastrado");
    }
  }

  // Registra o usuario se não tiver nenhum erro no cadastro
  if (count($errors) == 0) {
  	$password = md5($password_1);//encripitando a senha antes de salvar no banco de dados 

  	$query = "INSERT INTO usuarios (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Login Realizado com Sucesso";
  	header('location: paginaUser.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Nome de Usuario é requerido");
  }
  if (empty($password)) {
  	array_push($errors, "Senha é Requerida");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Login Realizado com Sucesso";
  	  header('location: paginaUser.php');
  	}else {
  		array_push($errors, "Combinação errada de nome de usuario/Senha");
  	}
  }
}

//REGISTRAR ACADEMIA

if (isset($_POST['reg_acad'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $nomeAcademia = mysqli_real_escape_string($db, $_POST['nomeAcademia']);
  

  if (empty($nomeAcademia)) { array_push($errors, "É requerido escolher uma academia"); }

  if (count($errors) == 0) {

    $query = "UPDATE usuarios SET academiaCadastrada='$nomeAcademia' WHERE username = '$username'";

    //$query = "UPDATE usuarios SET (academiaCadastrada) = ('$nomeAcademia') WHERE id = 1";
  
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Academia cadastrada com sucesso";
  	header('location: paginaUser.php');
  }
}

//REGISTRAR CURSOS

if (isset($_POST['reg_curs'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $nomeCurso = mysqli_real_escape_string($db, $_POST['nomeCurso']);
  
  if (empty($nomeCurso)) { array_push($errors, "É requerido escolher um Curso"); }

  if (count($errors) == 0) {
    
    $query = "UPDATE usuarios SET cursosCadastrados = CONCAT(cursosCadastrados, ' $nomeCurso') WHERE username = '$username'";
    
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Curso cadastrado com sucesso";
  	header('location: paginaUser.php');
  }
}

//REGISTRAR PLANOS

if (isset($_POST['reg_plan'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $nomePlano = mysqli_real_escape_string($db, $_POST['nomePlano']);
  
  if (empty($nomePlano)) { array_push($errors, "É requerido escolher um Plano"); }

  if (count($errors) == 0) {
    
    $query = "UPDATE usuarios SET planoCadastrado='$nomePlano' WHERE username = '$username'";
    
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Plano comprado com sucesso";
  	header('location: paginaUser.php');
  }

}


?>