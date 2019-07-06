<?php
	define('HOST', '');
	define('USUARIO', '');
	define('SENHA', '');
	define('DB', '');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('erro na conexão com o banco de dados');
?>