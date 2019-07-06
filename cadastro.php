<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json");
	require_once('conexao.php');

	if(!isset($_POST['usuario']) || empty($_POST['usuario']) || !isset($_POST['senha']) || empty($_POST['senha'])){
		echo "Necessário passar usuário e senha";
	}else{
		$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
		$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
		
		$query = "insert into usuarios values (null, '" . $_POST['usuario'] . "' , md5('" . $_POST['senha'] ."'));";
		$result = mysqli_query($conexao, $query);
		echo json_encode($result);
		/*$total = mysqli_num_rows($result);
		$retorno_banco = array();
		if($total == 1){
			while($linha = mysqli_fetch_assoc($result)){
				$retorno_banco[] = array("usuario_id" => $linha['usuario_id'], "nome" => $linha['nome']);
			}
			echo "logado";
		echo json_encode($retorno_banco);
		}else{
			echo "Usuário ou senha incorretos";
		}*/
	}
?>