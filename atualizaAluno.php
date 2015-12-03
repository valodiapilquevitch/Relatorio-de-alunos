<?php

			 session_start();
			  if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['passport']) == true)) {
				  
				   unset($_SESSION['login']);
				    unset($_SESSION['senha']);
					 header('location:login.php'); 
				   } //$logado = $_SESSION['login']; 
include 'connect.php';
require_once('sanitize.php');

//$_POST['nome'] = Sanitize::filter($_POST['nome']);
//$_POST['curriculum'] = Sanitize::filter($_POST['curriculum']);
//$_POST['turma'] = Sanitize::filter($_POST['turma']);
//$_POST['ciclo'] = Sanitize::filter($_POST['ciclo']);
//$_POST['estatus'] = Sanitize::filter($_POST['estatus']);

$hash  =  $_POST [  'hash'  ] ; 
if( isset($_POST['Salvar']))	{
	if ($_POST['hash'] != $_SESSION['_token'])
	{
				echo "<br />" . $hash ."<br />";
			echo $_SESSION['_token'];
			
		die ("Desculpe!");
	}
		$editor_foto  =  $_POST [  'foto'  ] ; 
		$editor_nome  =  $_POST [  'nome'  ] ; 
		$editor_curriculum  =  $_POST [  'curriculum'  ] ; 
		$turma  =  $_POST [  'turma'  ] ; 
		$ciclo  =  $_POST [  'ciclo'  ] ; 
		$estatus  =  $_POST [  'estatus'  ] ; 
		$alunos_id  =  $_POST [  'alunos_id'];

		//MySqli Insert Query
		$insert_row = $conn->query("UPDATE alunos SET 
		foto='".$editor_foto."',
		nome='".$editor_nome."',
		curriculum='".$editor_curriculum."',
		turma='".$turma."',
		ciclo='".$ciclo."',
		estatus='".$estatus."'
		WHERE alunos_id ='".$alunos_id."' ");
		if($insert_row){
			print 'Success! DADOS ATUALIZADOS  para o aluno de ID = '.$alunos_id.' <br />';
			header("Location: relatorio.php"); 
		}else{
			die('Error : ('. $conn->errno .') '. $conn->error);
		}
		$conn->close();
}
?>


