<?php
	include 'connect.php';
			 session_start();
			  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['passport']) == true)) {
				   unset($_SESSION['login']);
				    unset($_SESSION['senha']);
					 header('location:login.php'); 
				   } //$logado = $_SESSION['login'];
$_SESSION['_token'] =(!isset($_SESSION['_token'])) ? md5(hash('sha512', rand(100, 1000))): $_SESSION['_token'];
$_SESSION['_token'] = md5(hash('sha512', rand(100, 1000)));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualização de Informações de Alunos</title>
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/css/global.css" rel="stylesheet">
        <script src="lib/ckeditor/ckeditor.js"></script>
        <script src="lib/ckeditor/ckfinder/ckfinder.js"></script>
        <script src="lib/JQuery/JQuery.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>
    </head>
 <body>
    <?php
$id  =  $_POST [  'id'  ] ; 
	$query = 'Select * From alunos WHERE alunos_id="'.$id.'"';
	$result = $conn->query($query);
	$rowcount=mysqli_num_rows($result);
		if($rowcount !=0)
			{
				while($row = $result->fetch_array())
			 		{
						$editor_foto = $row['foto'];
						$editor_nome =  htmlspecialchars  ($row['nome'], ENT_QUOTES);
						$editor_curriculum =  htmlspecialchars  ($row['curriculum'], ENT_QUOTES);
						$turma = htmlspecialchars($row['turma'], ENT_QUOTES);
						$ciclo = htmlspecialchars($row['ciclo'], ENT_QUOTES);
						$estatus = htmlspecialchars($row['estatus'], ENT_QUOTES);
						$alunos_id = $row['alunos_id'];
	?>
        <div class="container-fluid">
             <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-12">
					<p>Atualização de Informações de Alunos.</p>
                </div>               
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <form action="atualizaAluno.php" method="post">
                    <label for="sel1">Foto do Perfil:</label>
                        <textarea name="foto" id="foto" rows="10" cols="80">
                        	 <?php
						print $editor_foto ; 
						?>
                        </textarea>
                        <script>
                        CKEDITOR.replace( 'foto' , {
	filebrowserBrowseUrl: 'http://mba.butantan.gov.br/alunos/lib/ckeditor/ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'http://mba.butantan.gov.br/alunos/lib/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
                        </script>
                </div>
                 <div class="col-xs-12 col-sm-6 col-md-8">
                    <label for="sel1">Nome:</label>
                        <textarea name="nome" id="nome" rows="10" cols="80">
                        		 <?php
						print $editor_nome ; 
						?>
                        </textarea>
                        <script>
                        CKEDITOR.replace( 'nome' );
                        </script>
                </div>
            </div>
                        <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-8">
                    	<label for="sel1">Mini-Curriculum:</label>
                        <textarea name="curriculum" id="curriculum" rows="10" cols="80">
                        			 <?php
						print $editor_curriculum ; 
						?>
                        </textarea>
                        <script>
                        CKEDITOR.replace( 'curriculum' );
                        </script>
                </div>
                 <div class="col-xs-6 col-sm-4">
                        <label for="sel1">Turma</label>
                            <select class="form-control" id="turma" name="turma" required>
                            <option  value="<?php print $turma ;?>"><?php print $turma ;?></option>
                        </select>                     
                        <label for="sel1">Entrada do Ciclo:</label>
                        <select class="form-control" id="ciclo" name="ciclo" required>
                            <option  value="<?php print $ciclo ;?>"><span style="color:#3AED33"><?php print $ciclo ;?></span></option>
                        </select>
                        <label for="sel1">Situação:</label>
                            <select class="form-control" id="estatus" name="estatus" required>
                            <?php 
								$query_estatus = 'Select * From estatus';
								$result_estatus = $conn->query($query_estatus);
								$rowcount_estatus=mysqli_num_rows($result_estatus);
								if($rowcount_estatus !=0)
								{
										while($row_estatus = $result_estatus->fetch_array())
										{
										$estatus_id = $row_estatus['id_estatus'];
										$estatus = $row_estatus['estatus'];
											 echo "<option  value='".$estatus."'>".$estatus."</option>";
										}	
								}
							?>
                        </select>
                      <hr/>
					  <input type="hidden" name="hash" id="hash" value="<?php print $_SESSION['_token'] ;?>">
                      <input type="hidden" name="alunos_id" id="alunos_id" value="<?php print $alunos_id ;	?>">
                      <input type="submit" name="Salvar" class="salvar">
                </div>
            </div>
            </form>
        </div>
        <hr />
        <?php
					}
			} else {
					echo "erro";
					}
	$conn->close();
?>
        </div>
    </body>
</html>


                        