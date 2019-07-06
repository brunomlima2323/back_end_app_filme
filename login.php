<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json");
	require_once('conexao.php');

	if(!isset($_POST['usuario']) || empty($_POST['usuario']) || !isset($_POST['senha']) || empty($_POST['senha'])){
		echo "Necessário passar usuário e senha";
	}else{
		$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
		$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

		$query = "select usuario_id, nome from usuarios where nome = '" . $_POST['usuario'] . "' and senha = md5('" . $_POST['senha'] . "');";

		$result = mysqli_query($conexao, $query);
		$total = mysqli_num_rows($result);
		$retorno_banco = array();
		if($total == 1){
			while($linha = mysqli_fetch_assoc($result)){
				$retorno_banco[] = array("usuario_id" => $linha['usuario_id'], "nome" => $linha['nome']);
			}
		echo json_encode($retorno_banco['0']);
		}else{
			echo "Usuário ou senha incorretos";
		}
	}
?>