<?php
$conn = mysqli_connect("localhost","root","","catalogo_alunos");
$conn-> set_charset ("utf8");

if (mysqli_connect_errno())
  {
  echo "Erro de conexão com MySQL: " . mysqli_connect_error();
  }
?>