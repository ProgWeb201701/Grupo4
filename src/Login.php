<?php
include_once './connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$matricula = $_POST["usuario"];
$senha = $_POST["password"];

      $verifica = mysqli_query($connection, "SELECT * FROM aluno WHERE matricula = '".$matricula."' AND senha = '".$senha."';") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          setcookie("matricula",$matricula);
          header('Location: http://localhost/grupo4/src/indexAluno.html');
        }
   
?>