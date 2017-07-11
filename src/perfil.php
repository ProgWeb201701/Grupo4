<?php 
    session_start();
    if (!isset($_SESSION['sou'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./login.html';</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TCCs</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;TCCs</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./perfil.php">Meu Perfil <i class="fa fa-user-circle "></i></a></li>
                        <li><a href="./action/logout.php">Sair <i class="fa fa-sign-out "></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <!-- INÍCIO PAGE ALUNO --> 
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src=<?php 
                                include_once './connection/connection.php';

                                $conn = new Connection();
                                $connection = $conn->getConnection();
                                $sql;

                                if($_SESSION['sou']>1){
                                    $sql = "SELECT foto FROM professor WHERE siape = '".$_SESSION['usuario']."'";
                                }
                                if($_SESSION['sou']==1){
                                    $sql = "SELECT foto FROM aluno WHERE matricula = '".$_SESSION['usuario']."'";
                                }

                                $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                $row = $resultado->fetch_assoc();
                                if($row['foto'] == ''){
                                    echo "'assets/img/find_user.png'";
                                } else {
                                        echo "'src/".$row['foto']."'";
                                    }
                            ?>
                         class="img-responsive user-image" />
            
                    </li>


                    <li>
                    <?php if($_SESSION['sou'] == 3){
                                echo "<a href='indexCoordenador.php'><i class='fa fa-desktop'></i>Inicio</a>";} 
                                if($_SESSION['sou']==2){
                                    echo "<a href='indexProfessor.php'><i class='fa fa-desktop'></i>Inicio</a>";} 
                                if($_SESSION['sou']==1){
                                     echo "<a href='indexAluno.php'><i class='fa fa-desktop'></i>Inicio</a>";} 
                            ?>
                    </li>
                    <li>
                    <?php if($_SESSION['sou'] > 1){
                        echo "<a href='turmas.php'><i class='fa fa-users'></i>Turmas</a>";}
                        ?>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Monografia<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <?php if($_SESSION['sou'] == 3){
                                echo "<li><a href='atribuirMonografia.php'>Atribuir monografia</a></li>";} 
                                if($_SESSION['sou']>1){
                                    echo "<li><a href='avaliacoes.php'>Avaliações</a></li><li><a href='monografias.php'>Monografias</a></li>";
                                }
                                if($_SESSION['sou']==1){
                                    echo "<li><a href='enviarMonografia.php'>Enviar monografia</a></li><li><a href='avaliacoesAluno.php'>Visualizar avaliações</a></li>";
                                }
                            ?>
                            
                        </ul>
                    </li>
                         <?php if($_SESSION['sou'] > 1){
                     echo "<li><a href='areaInteresse.php'><i class='fa fa-user-circle ''></i>Áreas de Interesse</a></li>";
                 }
                    ?>
                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                         <h2>Perfil de: <?php 
                                include_once './connection/connection.php';

                                $conn = new Connection();
                                $connection = $conn->getConnection();
                                $sql;

                                if($_SESSION['sou']>1){
                                    $sql = "SELECT nome FROM professor WHERE siape = '".$_SESSION['usuario']."'";
                                }
                                if($_SESSION['sou']==1){
                                	$sql = "SELECT nome FROM aluno WHERE matricula = '".$_SESSION['usuario']."'";
                                }

                                $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                $row = $resultado->fetch_assoc();
                                        echo $row['nome'];
                            ?></h2>
                            <hr>
                    </div>
                </div>
                
                
                <div class="row">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="action/atualiza_perfil.php" >

                        <div class="form-group">
                        <label class="control-label col-sm-2" for="titulo">Nome:</label>
                        <div class="col-sm-8">
                          
                          <?php 
                                include_once './connection/connection.php';

                                $conn = new Connection();
                                $connection = $conn->getConnection();
                                $sql;

                                if($_SESSION['sou']>1){
                                    $sql = "SELECT * FROM professor WHERE siape = '".$_SESSION['usuario']."'";
                                } else {
                                    $sql = "SELECT * FROM aluno WHERE matricula = '".$_SESSION['usuario']."'";
                                }                                

                                $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                $row = $resultado->fetch_assoc();
                                        echo "<input type='text' class='form-control' id='nome' name='nome' value='".$row['nome']."'>";
                                        echo "</div></div><div class='form-group'>
                        <label class='control-label col-sm-2' for='usuario'>";
                        if($_SESSION['sou']>1){
                                    echo "Siape:";
                                } else {
                                    echo "Matricula:";
                                }
                                echo "</label><div class='col-sm-8'><input type='text' class='form-control' id='usuaro' name='usuario' value='";
                        if($_SESSION['sou']>1){
                            echo $row['siape'];
                        } else {
                            echo $row['matricula'];
                        }
                        echo "' required='true'></div></div><div class='form-group'>
                        <label class='control-label col-sm-2' for='senha'>Senha:</label>
                        <div class='col-sm-8'>
                          <input type='password' class='form-control' id='senha' name='senha' value='".$row['senha']."' required='true'>
                        </div>
                      </div>";
                            echo "<div class='form-group'>
                        <label class='control-label col-sm-2' for='email'>E-Mail:</label>
                        <div class='col-sm-8'>
                          <input type='email' class='form-control' id='email' name='email' required='true' value='".$row['email']."'>
                        </div>
                      </div>";

                            ?>

                            <input type="file" name="foto" class="control-label col-sm-2"/>
                
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <button type="submit" id="submit" name="submit" class="btn btn-default" value="Enviar">Salvar Mudanças</button>
                        </div>
                      </div>
                </div>
                
                <!-- /. ROW  -->
        

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS NO FINAL PARA REDUZIR O TEMPO DE LOADING-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>