<?php 
include 'connect.php';
session_start();
$usuario = $_POST['login'];
$passport = $_POST['senha'];
	$query = 'SELECT * FROM usuarios WHERE username = "'.$usuario.'" AND password = "'.$passport.'"';					
	$result = $conn->query($query);
	$rowcount=mysqli_num_rows($result);
	if($rowcount !=0)
	{
		while($row = $result->fetch_array())
		{
				$_SESSION['usuario']=$usuario;
				$_SESSION['passport']=$passport;
				header('location:index.php');
		}
	} else 
			{
				header('location:login.php');
			}
 ?>
	