<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// Inicializar Variaveis
$username = "";
$email    = "";
$errors = array(); 

// Concectar com o banco de dados
$db = mysqli_connect('localhost', 'root', '', 'movimentofit');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$sql = "SELECT id, username, email, img FROM usuarios";
$result = $db->query($sql);


if ($result->num_rows > 0) {
    // dados de saída de cada linha
    while($row = $result->fetch_assoc()) {
        print "<br> id: ". $row["id"]. "<br> - Name: ". $row["username"]. "<br> - Email: " . $row["email"] . "<br>";
      print "<img src=\"".$row["img"]."\">";
     
    }
} else {
    print "0 results";
}



$db->close();   
        ?> 



</body>
</html>