<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$matricula = $_POST['matricula'];
$senha = MD5($_POST['senha']);
$$entrar = $_POST['entrar'];

if (isset($entrar)) {
            
      $verifica = mysql_query("SELECT * FROM aluno WHERE matricula = '$matricula' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          setcookie("matricula",$matricula);
          header("Location:indexAluno.php");
        }
    }
?>