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
                        <img src="assets/img/find_user.png" class="img-responsive user-image" />
            
                    </li>


                    <li>
                        <a href="indexAluno.php"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>Monografia<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="enviarMonografia.php">Enviar monografia</a>
                            </li>
                            <li>
                                <a href="#">Visualizar feedback</a>
                            </li>
                            <li>
                                <a href="#">Visualizar avaliações</a>
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
                     <h2>Avaliações</h2> 
                     <hr />  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>
                                        Professor avaliador
                                    </th>
                                    <th>
                                        Nota
                                    </th>
                                    <th>
                                        Feedback
                                    </th>
                                    <th class="text-center">
                                        Observação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include_once './connection/connection.php';

                                    $conn = new Connection();
                                    $connection = $conn->getConnection();

                                    $sql1 = "SELECT idMonografia FROM monografia WHERE aluno_matricula = ".$_SESSION['usuario']."";
                                    $resultadoIdMonografia = mysqli_query($connection, $sql1) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
                                    $row = $resultadoIdMonografia->fetch_assoc();
                                    $idMonografia = $row['idMonografia'];

                                    $sql = "SELECT * FROM avaliacao INNER JOIN professor ON siape = professor_siape INNER JOIN prof_avalia_monografia ON prof_avalia_monografia.professor_siape = avaliacao.professor_siape WHERE Monografia_idMonografia = '".$idMonografia."';";

                                    $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                    while($row = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>
                                                        ".$row["nome"]."
                                                    </td>
                                                    <td>
                                                        ".$row["nota"]."
                                                    </td>
                                                    <td>
                                                        <a href=''><i class='fa fa-download' aria-hidden='true'></i><span> Baixar</span></a>
                                                    </td>
                                                    <td class='text-center'>
                                                        ".$row["observacao"]."
                                                    </td>
                                                </tr>";
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <h5>Informações</h5>
                            <p>Texto de exemplo de footer</p>
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