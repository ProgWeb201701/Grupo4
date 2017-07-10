<?php 
    session_start();
    if (!isset($_SESSION['sou'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./login.html';</script>";
    }
    if($_SESSION['sou'] == 2){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para isso');window.location.href='./indexProfessor.php';</script>";
    } 
    if($_SESSION['sou'] == 1){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para isso');window.location.href='./indexAluno.php';</script>";
    die();
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
        <!-- INÍCIO PAGE COORDENADOR --> 
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive user-image" />
            
                    </li>


                    <li>
                        <a href="indexCoordenador.php"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <li>
                        <a href="turmas.php"><i class="fa fa-users "></i>Turmas</a>
            
                    </li>

                            <li>
                                <a href="#"><i class="fa fa-edit "></i>Monografia<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    
                                    <?php if($_SESSION['sou'] == 3){
                                        echo "<li><a href='atribuirMonografia.php'>Atribuir monografia</a></li>";} 
                                        if($_SESSION['sou']>1){
                                            echo "<li><a href='avaliacoes.php'>Avaliações</a></li>";
                                        }
                                    ?>
                                    <li>
                                        <a href="monografias.php">Monografias</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Olá, <?php 
                                include_once './connection/connection.php';

                                $conn = new Connection();
                                $connection = $conn->getConnection();

                                $sql = "SELECT nome FROM professor WHERE siape = '".$_SESSION['usuario']."'";

                                $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                $row = $resultado->fetch_assoc();
                                        echo $row['nome'];
                            ?></h2>
                            <hr>
                    </div>
                </div>
                
                
               <div class="row">
                <form class="form-horizontal" action="./action/adicionaAluno.php" method="post">
                    <div class="col-md-12">
                        <h3>Alunos cadastrados:</h3>
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                 
                                    <th>
                                        Nome do Aluno
                                    </th>
                                    <th>
                                        Matricula
                                    </th>
                                    <th>
                                        Adicionar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include_once './connection/connection.php';

                                    $conn = new Connection();
                                    $connection = $conn->getConnection();

                                    $sql = "SELECT nomeTurma FROM turma WHERE Professor_siape = '".$_SESSION['usuario']."'";
                                    $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
                                    $row = $resultado->fetch_assoc();
                                    $Turma = $row['nomeTurma'];

                                    $sql = "SELECT * FROM `aluno`;";

                                    $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                    while($row = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                    
                                                    <td>
                                                        ".$row["nome"]."
                                                    </td>
                                                    <td>
                                                        ".$row["matricula"]."
                                                    </td>
                                                    <td>
                                                    <input type='checkbox' name='check_box[]' value='".$row["matricula"]."'/>
                                                    </td>
                                                </tr>";
                                    } 
                                ?>
                                <td>
                                        <button type="submit" name="submit" class="btn btn-default">Adicionar alunos à sua turma</button>
                                        </td>
                                                    
                                        </tr>
                          
                                 </td>
                            </tbody>     
                      </div>
                        </table>
                    </div>
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