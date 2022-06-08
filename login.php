<?php

session_start();
$email_login = "";
$senha_login = "";
$errors = array(); 

include_once("conexao.php");

if (isset($_POST['logar'])) {
    $email_login = mysqli_real_escape_string($conexao, $_POST['email_login']);
    $senha_login = mysqli_real_escape_string($conexao, $_POST['senha_login']);

    if (empty($email_login)) {
        array_push($errors, "Email é requerido");
    }
    if (empty($senha_login)) {
        array_push($errors, "Senha é necessaria");
    }

    if (count($errors) == 0) {
        $senha_login = md5($senha_login);
        $query = "SELECT * FROM usuarios WHERE email='$email_login' AND senha='$senha_login'";
        $results = mysqli_query($conexao, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email_login;
          $_SESSION['success'] = "Você conseguiu logar";
          header('location: paginaUser.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }

}
?>