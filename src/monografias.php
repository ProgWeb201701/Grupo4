<?php session_start();
    if (!isset($_SESSION['sou'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./login.html';</script>";
    }
    if($_SESSION['sou'] == 1){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./indexAluno.php';</script>";
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
                        <li><a href="./action/logout.php">Sair <i class="fa fa-sign-out "></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive user-image" />
            
                    </li>


                    <li>
                        <a href=<?php if($_SESSION['sou'] == 2){
                                        echo "'indexProfessor.php'";} else {echo "'indexCoordenador.php'";} ?>><i class="fa fa-desktop "></i>Inicio</a>
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
                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Monografias</h2> 
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
                                        Título
                                    </th>
                                    <th>
                                        Versão
                                    </th>
                                    <th>
                                        Aluno
                                    </th>
                                    <th>
                                        Turma
                                    </th>
                                    <th>
                                        Download
                                    </th>
                                    <th>
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include_once './connection/connection.php';

                                    $conn = new Connection();
                                    $connection = $conn->getConnection();

                                    $sql = "SELECT * FROM monografia INNER JOIN aluno ON aluno.matricula = monografia.aluno_matricula LEFT JOIN turma_has_aluno ON aluno.matricula = turma_has_aluno.aluno_matricula;";

                                    $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

                                    while($row = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>
                                                        ".$row["titulo"]."
                                                    </td>
                                                    <td>
                                                        ".$row["versao"]."
                                                    </td>
                                                    <td>
                                                        ".$row["nome"]."
                                                    </td>
                                                    <td>
                                                        ".$row["Turma_nomeTurma"]."
                                                    </td>
                                                    <td>
                                                        <a href='./uploads/".$row['caminhoEntrega']."' target='_blank'><i class='fa fa-download' aria-hidden='true'></i><span> Baixar</span></a>
                                                    </td>
                                                    <td class='text-center'>
                                                        <a href='avaliar.php?titulo=".$row["titulo"]."&idMonografia=".$row['idMonografia']."'><i class='fa fa-arrow-right' aria-hidden='true'></i><span> Avaliar</span></a>
                                                    </td>
                                                </tr>";
                                    } 
                                ?>
                            </tbody>
                        </table>
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
