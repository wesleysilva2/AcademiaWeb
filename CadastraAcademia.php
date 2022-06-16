<?php include('server.php') ?>
<?php 
  //session_start(); // So entra na pagina se estiver logado

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
    <title>Cadastro de Academias</title>
</head>
<body>
    <main>
    <section class="section-hero">
            <section class="section-courses">
                <div class="container">
                  <span class="subheading">Listas de Academias</span>
                  <h2 class="heading-secondary">Selecione Sua Academia</h2>
                </div>
                
                <form method="post" action="CadastraAcademia.php">
                    <div class="input-group">
                        <select type="nomeAcademia" name="nomeAcademia" value="<?php echo $nomeAcademia; ?>"> 
                            <option selected></option>
                            <?php 
                                $sql = mysqli_query($db,"select nomeAcademia from academias where id >= 1");
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo "<option>".$row['nomeAcademia']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn" name="reg_acad">Cadastrar</button>
                    </div>
                </form>
     
                </div>
              </section>
        </section>
    </main>
    <h1>Aqui né</h1>
</body>
</html>