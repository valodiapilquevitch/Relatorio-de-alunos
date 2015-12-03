	<?php
		session_start();
		if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['passport']) == true)) 
		{
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
        <div class="container">
            <img src="lib/img/header.jpg">
<form method="post" action="">
<table>
<thead>Filtro de Busca</thead>
    <tbody>
<tr>
    <td>
        <label for="sel1">Turma</label>
        <select class="form-control" id="turma" name="turma" >
        <option  value="" selected class="bg-success"><span style="color:#3AED33">Todos</span></option>
        <option  value="1">1</option>
        <option  value="2">2</option>
        </select>
    </td>
    <td>
        <label for="sel1">Situação:</label>
        <select class="form-control" id="estatus" name="estatus" >
        <option value="" selected class="bg-success"><span style="color:#3AED33">Todos</span></option>
        <option value="Formado" >Formado</option>
        <option value="Cursando" >Cursando</option>
        <option value="Desistencia" >Desistencia</option>
        <option value="Trancado" >Trancado</option>
        </select>
    </td>
</tr>
<tr>
		<td><input type="submit" name="Buscar"  value="Buscar"></td>
</tr>
    </tbody>
</table>
</form>
                <?php
					include 'connect.php';
					if (isset($_POST['Buscar'])) 
						{	
							$form_turma = $_POST['turma'];
							$form_estatus = $_POST['estatus'];
							
							if (empty($form_turma) && empty($form_estatus)) {
								$query = 'Select * From alunos ORDER BY nome ';
							} else if (empty($form_estatus)) {
								$query = 'Select * From alunos WHERE (turma ="'.$form_turma.'" )';
							} else if (empty($form_turma)) {
								$query = 'Select * From alunos WHERE (estatus ="'.$form_estatus.'" ) order by turma';
							}else {
								$query = 'Select * From alunos WHERE (turma ="'.$form_turma.'" ) AND (estatus ="'.$form_estatus.'") order by turma';
							}

						} else {
								$query = 'Select * From alunos order by turma';
							}
						//var_dump($form_turma);
						//var_dump($form_estatus);
					$result = $conn->query($query);
					$rowcount=mysqli_num_rows($result);
					if($rowcount !=0)
					{
					echo ' 
						<table id="relatorio" border="1" width="1250px" class="table-striped">
						<tr>
						<td align="center">Foto Perfil</td>
						<td align="left">Nome</td>
						<td align="left">Mini-curriculum </td>
						<td align="left">Turma</td>
						<td align="left">Ingressou no ciclo</td>
						<td align="left">Estatus</td>
						<td align="left">Editar</td>
						</tr>';
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
                <tr>
                    <form action="edit.php" method="post">
                        <td><?php echo  $editor_foto ?></td>
                        <td align="center"><?php echo  $editor_nome ?></td>
                        <td><?php echo  $editor_curriculum?> </td>
                        <td align="center"><?php  echo  $turma ?></td>
                        <td align="center"><?php echo  $ciclo ?></td>
                        <td align="center"><?php echo   $estatus ?></td>
                        <input type="hidden" name="hash" id="hash" value="<?php print $_SESSION['_token'] ;?>">
                        <td align="center"><input type="hidden" name="id" id="alunos_id" value="<?php print $alunos_id ;?>">
                        <input type="submit" name="Salvar" id="submit-relatorio" value=""></td>
                    </form>
                </tr>
                <?php
               			}
						echo	"</table>";
               		 }	else {
						echo "Nenhum resultado Encontrado!"; 
					 }
                ?>
        </div>
    </body>
</html>
