<?php

include_once("conexao.php");

$email_login = $_POST['email_login'];
$senha_login = MD5($_POST['senha_login']);
$logar = $_POST['logar'];
$conexao = new mysqli('localhost','root','','movimentofit');

if(isset($logar)){
    $verifica = $conexao -> query("SELECT * FROM usuarios WHERE email = '$email_login' AND senha = '$senha_login'")
    or die ("erro ao selecionar coluna");

    $rows = $verifica -> num_rows;
    if($rows <=0){
        echo "Falha ao logar! E-mail ou senha incorretos";
          

    }else{
        echo "Login Feito Com sucesso!";
        header("location:paginaUser.html");
    }
}


?>