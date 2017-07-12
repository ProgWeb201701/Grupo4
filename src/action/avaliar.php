<?php 
session_start();
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

if (isset($_POST['submit']))
{
	$filename = $_FILES["feedback"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["feedback"]["size"];
	$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
	{	
		// Renomeia arquivo
		$newfilename = md5($file_basename) . $file_ext;
		
		include_once '../connection/connection.php';

		$conn = new Connection();
		$connection = $conn->getConnection();

		$idMonografia = $_POST["idMonografia"];
		$nota = $_POST["nota"];
		$caminhoFeedback = $newfilename;
		$observacao = $_POST["comentarios"];

		$sql = "INSERT INTO avaliacao(nota, caminhoFeedback, observacao, professor_siape) VALUES ('".$nota."', '".$caminhoFeedback."', '".$observacao."', '".$_SESSION['usuario']."');";

		$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
		
		if ($resultado) {
			move_uploaded_file($_FILES["feedback"]["tmp_name"], "../uploads/" . $newfilename);
			echo"<script language='javascript' type='text/javascript'>alert('Avaliação enviada com sucesso!');window.location.href='../avaliacoes.php';</script>";
		}
		
	}
	elseif ($filesize > 200000000)
	{	
		// erro de tamanho de arquivo
		echo"<script language='javascript' type='text/javascript'>alert('O arquivo que voce está tentando enviar é grande demais.');window.location.href='../monografias.php';</script>";
	}
	else
	{
		// erro de tipo de aquivo
		echo"<script language='javascript' type='text/javascript'>alert('Apenas esses tipos de arquivos podem ser enviados: " . implode(', ',$allowed_file_types)."');window.location.href='../monografias.php';</script>";
		unlink($_FILES["file"]["tmp_name"]);
	}

}
?>