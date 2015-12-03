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
<?php
include 'connect.php';
	$query = 'Select * From alunos WHERE estatus="Cursando" ORDER BY nome';
	$result = $conn->query($query);
	$rowcount=mysqli_num_rows($result);
		if($rowcount !=0)
			{
				while($row = $result->fetch_array())
			 		{
						$editor_foto = $row['foto'];
						$editor_nome = $row['nome'];
						$editor_curriculum = $row['curriculum'];
						$turma = $row['turma'];
						$ciclo = $row['ciclo'];
						$estatus = $row['estatus'];
						$alunos_id = $row['alunos_id'];
				?>
                        	<div class="alunos bg-alternate">
                            	<div class="perfil">
                                	<center><?php echo $editor_foto ?></center>
                                </div>
                                <div class="content">
                                    <span class="nome"><?php echo  $editor_nome ?> </span>
                                    <span class="descricao"><?php echo  $editor_curriculum?> </span>
                                    <span class="descricao"><?php  echo 'Turma  '.  $turma ?> </span>
                                    <span class="descricao"><?php echo '<br />Ingressou no ciclo '.  $ciclo ?> </span>
                                    <span class="descricao"><?php echo '<br />Estatus: '.  $estatus ?> </span>
                                </div>
                            </div>
                           <?php
						echo '<hr />';
					}
			}
						?>
   </section>
</body>
</html>
