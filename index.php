<?php
			 session_start();
			  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['passport']) == true)) {
				  
				   unset($_SESSION['login']);
				    unset($_SESSION['senha']);
					 header('location:login.php'); 
				   } //$logado = $_SESSION['login']; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/css/global.css" rel="stylesheet">
		<title>Alunos</title>
</head>
<body>
    <section class="container">
        <img src="lib/img/header.jpg">
        <div class="acesso">
            <center><a href="cadastro.php" target="_blank"><img src="lib/img/cadsatro.png" height="100px"></a></center>
        </div>
        <div class="acesso">
            <center><a href="relatorio.php" target="_blank"><img src="lib/img/relatorio.png" height="100px"></a></center>
        </div>
        <div class="acesso">
            <center><a href="alunos.php" target="_blank"><img src="lib/img/acesse.png" height="100px"></a></center>
        </div>
        <div class="acesso">
            <center><a href="logout.php"><img src="lib/img/sair.png" height="100px"></a></center>
        </div>
    </section>
</body>
</html>
