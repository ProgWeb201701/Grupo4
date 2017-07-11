<?php 
    session_start();
    if (!isset($_SESSION['sou'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para acessar essa pagina');window.location.href='./login.html';</script>";
    }
    if($_SESSION['sou'] == 1){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para isso');window.location.href='./indexAluno.php';</script>";
    }

    include_once './connection/connection.php';

    $conn = new Connection();
    $connection = $conn->getConnection();
    $sql = "SELECT * FROM `prof_avalia_monografia` WHERE `monografia_idMonografia` = ".$_GET['idMonografia']." AND `professor_siape` = '".$_SESSION['usuario']."'";
    $resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
    $count = $resultado->num_rows;
    if($count == 0){
        echo "<script language='javascript' type='text/javascript'>alert('Não tem permissão para avaliar essa monografia!');window.location.href='./monografias.php';</script>";
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
                                } ?>
                            <li>
                                <a href="monografias.php">Monografias</a>
                            </li>
                        </ul>
                    </li>
                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
	                    <h2>Avaliar TCC: <?php echo $_GET["titulo"]; ?></h2>

						<hr />
                    </div>

                 <!-- /. ROW  -->
                  
                 <!-- /. ROW  -->           
    			</div>
    			<div class="row">
    				<form class="form-horizontal" action="./action/avaliar.php" method="post" enctype="multipart/form-data">
					  <div class="form-group">
                        <label class="control-label col-sm-2" for="idMonografia">ID da Monografia:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="idMonografia" name="idMonografia" readonly="true" value=<?php echo "'".$_GET['idMonografia']."'"; ?> >
                        </div>
                      </div>
                      <div class="form-group">
					    <label class="control-label col-sm-2" for="nota">Nota:</label>
					    <div class="col-sm-9">
					    	<input type="number" class="form-control" id="nota" placeholder="Nota" name="nota" required="true">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="feedback">Feedback:</label>
					    <div class="col-sm-9"> 
					      <input type="file" class="form-control" id="feedback" placeholder="Enviar o arquivo da monografia com os comentários" name="feedback" required="true">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="comentarios">Comentários:</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" rows="5" id="comentarios" placeholder="Comentários adicionais sobre o trabalho" name="comentarios" required="true"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-9">
					      <button type="submit" name="submit" class="btn btn-default">Enviar Avaliação</button>
					    </div>
					  </div>
					</form>
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
