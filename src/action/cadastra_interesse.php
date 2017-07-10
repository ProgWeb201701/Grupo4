<?php 
session_start();
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$siape = $_SESSION['usuario'];

foreach($_POST['check_box'] as $idInteresse){
$idInteresse = $idInteresse; 
}
$sql ="INSERT INTO `prof_has_interesse`(`siape`, `idInteresse`) VALUES ('".$siape."', '".$idInteresse."');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));


header('Location: http://localhost/grupo4/src/perfil.php');

?>