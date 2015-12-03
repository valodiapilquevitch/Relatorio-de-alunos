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
        <title>Cadastro de Informações de Alunos</title>
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="lib/css/global.css" rel="stylesheet">
        <script src="lib/ckeditor/ckeditor.js" charset="utf-8"></script>
        <script src="lib/JQuery/JQuery.js"></script>
        <script src="lib/bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
             <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-12">
					<p>Cadastro de novos alunos.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <form action="gravaAluno.php" method="post">
                    <label for="sel1">Foto do Perfil:</label>
                        <textarea name="foto" id="foto" rows="10" cols="80">
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
                        </textarea>
                        <script>
                        CKEDITOR.replace( 'curriculum' );
                        </script>          
                </div>
                 <div class="col-xs-6 col-sm-4">
                        <label for="sel1">Turma</label>
                            <select class="form-control" id="turma" name="turma" required>
                            <option  value="" selected class="bg-success"><span style="color:#3AED33">Selecione</span></option>
                            <?php 
								$query_turma = 'Select * From turma';
								$result_turma = $conn->query($query_turma);
								$rowcount_turma=mysqli_num_rows($result_turma);
								if($rowcount_turma !=0)
								{
									while($row_turma = $result_turma->fetch_array())
										{
										$id_turma = $row_turma['id_turma'];
										$turma = $row_turma['turma'];	
										  echo "<option  value='".$turma."'>".$turma."</option>";
										}
								}
							?>
                        </select>
                        <label for="sel1">Entrada do Ciclo:</label>
                            <select class="form-control" id="ciclo" name="ciclo" required>
                            <option  value="" selected class="bg-success"><span style="color:#3AED33">Selecione</span></option>
                            <?php 
								$query_ciclo = 'Select * From ciclo';
								$result_ciclo = $conn->query($query_ciclo);
								$rowcount_ciclo=mysqli_num_rows($result_ciclo);
								if($rowcount_ciclo !=0)
								{
										while($row_ciclo = $result_ciclo->fetch_array())
										{
										$id_ciclo = $row_ciclo['id_ciclo'];
										$ciclo = $row_ciclo['ciclo'];
											 echo "<option  value='".$ciclo."'>".$ciclo."</option>";	
										}	
								}
							?>
                        </select>
                        <label for="sel1">Situação:</label>
                            <select class="form-control" id="estatus" name="estatus" required>
                            <option value="" selected class="bg-success"><span style="color:#3AED33">Selecione</span></option>
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
					        <td align="center"><input type="hidden" name="hash" id="hash" value="<?php print $_SESSION['_token'] ;?>"></td>
                      <input type="submit" name="Salvar" class="salvar">
                </div>
            </div>
            </form>
        </div>
        </div>
    </body>
</html>
