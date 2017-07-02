<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$usuario = $_POST["usuario"];
$senha = $_POST["password"];

      $aluno = mysqli_query($connection, "SELECT * FROM aluno WHERE matricula = '".$usuario."' AND senha = '".$senha."';") or die("erro ao selecionar");
      $professor = mysqli_query($connection, "SELECT * FROM professor WHERE siape = '".$usuario."' AND senha = '".$senha."';") or die("erro ao selecionar");
      $coordenador = mysqli_query($connection, "SELECT * FROM turma WHERE Professor_siape = '".$usuario."';") or die("erro ao selecionar");

    if (mysqli_num_rows($aluno)<=0 && mysqli_num_rows($professor)<=0){
	    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
	    die();
    }else{
    	if (mysqli_num_rows($aluno)>0) {
		    setcookie("matricula", $usuario);
		    header('Location: http://localhost/grupo4/src/indexAluno.html');
    	} else if (mysqli_num_rows($professor)>0){
        if(mysqli_num_rows($coordenador)>0){
        setcookie("siape", $usuario);
        header('Location: http://localhost/grupo4/src/indexCoordenador.html');
        } else {
    		setcookie("siape", $usuario);
	    	header('Location: http://localhost/grupo4/src/indexProfessor.html');
    	}
	    
    }
  }
?>