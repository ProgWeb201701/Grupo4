<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="bem vindo">Bem vindo! <strong><?php echo $_SESSION['sou']; echo $_SESSION['usuario']; echo $_SESSION['nome']; ?></strong></div>


<p><? $_SESSION['nome']?></p>
<p><? $teste?></p>
<?php echo date('d/m/Y');?>
</body>
</html>