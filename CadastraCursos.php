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
                  <span class="subheading">Listas de Cursos</span>
                  <h2 class="heading-secondary">Selecione Seus Cursos</h2>
                </div>
                
                <form method="post" action="CadastraCursos.php">
                    <?php include('errors.php'); ?>
                    <div>
                    <p> <a href="paginaUser.php" style="color: purple;">PAGINA DE USUARIO</a> </p>
                    </div>
                    <br><br>
                    <div class="input-group">
                        <label>Nome de Usuario</label>
                        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
                    </div>
                    <div class="input-group">
                        <select type="nomeCurso" name="nomeCurso" value="<?php echo $nomeCurso; ?>"> 
                            <option selected></option>
                            <?php 
                                $sql = mysqli_query($db,"select nomeCurso from cursos where id >= 1");
                                while($row = mysqli_fetch_assoc($sql)){
                                    echo "<option>".$row['nomeCurso']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn" name="reg_curs">Cadastrar Curso</button>
                    </div>
                </form>
     
                </div>
              </section>
        </section>
    </main>
    <h1>Aqui né</h1>
</body>
</html>