<?php

include_once("conexao.php");

$nome_cad = $_POST['nome_cad'];
$email_cad = $_POST['email_cad'];
$senha_cad = $_POST['senha_cad'];

$sql = "insert into usuarios (nome, email, senha) values ('$nome_cad','$email_cad','$senha_cad')";
$salvar = mysqli_query($conexao, $sql);


mysqli_close($conexao);

?>