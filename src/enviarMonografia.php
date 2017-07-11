<?php 
    session_start();
    if (!isset($_SESSION['sou'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./login.html';</script>";
    }
    if($_SESSION['sou'] == 2){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./indexProfessor.php';</script>";
    } 
    if($_SESSION['sou'] == 3){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./indexCoordenador.php';</script>";
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
                        <a href="indexAluno.php"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Monografia<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Enviar monografia</a>
                            </li>
                         
                            <li>
                                <a href="avaliacoesAluno.php">Visualizar avaliações</a>
                            </li>
                        </ul>
                    </li>
                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Envie sua Monografia</h2>
                        <hr>
                    </div>
                </div>
                
                <div class="row">
                    <form class="form-horizontal" method="post" action="action/recebe_upload.php" enctype="multipart/form-data">

                        <div class="form-group">
                        <label class="control-label col-sm-2" for="titulo">Título:</label>
                        <div class="col-sm-8">
                          
                          <?php 
                                include_once './connection/connection.php';

                                $conn = new Connection();
                                $connection = $conn->getConnection();

                                $sql = "SELECT titulo FROM monografia WHERE aluno_matricula = '".$_SESSION['usuario']."'";

                                $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                $row = $resultado->fetch_assoc();
                                        echo "<input type='text' class='form-control' id='titulo' name='titulo' placeholder='".$row['titulo']."' disabled='true'>";
                            ?>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-sm-2" for="versao">Versão:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="versao" name="versao" placeholder="Informe Versão da Monografia" required="true">
                        </div>
                       </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="abstract">Abstract:</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" rows="10" id="abstract" name="abstract" placeholder="Insira o Abstract" required="true"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="file">Arquivo:</label>
                        <div class="col-sm-8">
                          <input type="file" class="form-control" id="file" name='file' required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <label class="checkbox-inline "><input type="checkbox" value="true" id="final" name="final">Esta é a versão final do meu trabalho.</label>
                        </div>
                      </div>
                
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <button type="submit" id="submit" name="submit" class="btn btn-default" value="Enviar">Enviar</button>
                        </div>
                      </div>
                    </form>

                </div>

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