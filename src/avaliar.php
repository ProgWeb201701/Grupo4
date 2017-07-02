﻿<!DOCTYPE html>
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
                        <li><a href="#">Sair <i class="fa fa-sign-out "></i></a></li>
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
                        <a href="indexProfessor.html"><i class="fa fa-desktop "></i>Inicio</a>
                    </li>
                    <li>
                        <a href="turmas.php"><i class="fa fa-users "></i>Turmas</a>
            
                    </li>


                    <li>
                        <a href="monografias.php"><i class="fa fa-edit"></i>Monografias</a>
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
    				<form class="form-horizontal" action="./action/avaliar.php" method="post">
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="nota">Nota:</label>
					    <div class="col-sm-9">
					    	<input type="number" class="form-control" id="nota" placeholder="Nota" name="nota">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="feedback">Feedback:</label>
					    <div class="col-sm-9"> 
					      <input type="file" class="form-control" id="feedback" placeholder="Enviar o arquivo da monografia com os comentários" name="feedback">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="comentarios">Comentários:</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" rows="5" id="comentarios" placeholder="Comentários adicionais sobre o trabalho" name="comentarios"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-9">
					      <button type="submit" class="btn btn-default">Enviar Avaliação</button>
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