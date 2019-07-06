<?php
	define('HOST', '127.0.0.1');
	define('USUARIO', 'root');
	define('SENHA', '');
	define('DB', 'appFilme');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('erro na conexão com o banco de dados');
?>