<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json");
	require_once('conexao.php');

	if(!isset($_POST['usuario_id']) || empty($_POST['usuario_id'])){
		echo "Não foram passados os parametros necessários";
	}else{
		$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
		
		$query = "select f.id from filmes f join usuarios_filmes uf on f.id = uf.idfilme join usuarios u on u.usuario_id = uf.idusuario where u.usuario_id = '" . $usuario_id . "';";
		$result = mysqli_query($conexao, $query);
		$n_linhas = mysqli_num_rows($result);
		$retornoBanco = array();
		while($n_linhas = mysqli_fetch_assoc($result)){
			$retornoBanco[] = $n_linhas;
		}
		echo json_encode($retornoBanco);


		//$query = "insert into usuarios_filmes values('null'," . $_POST['usuario_id'] . "," . $_POST['filme_id'] . ");";
		
		/*$query = "select nome from filmes where id = '" . $filme_id . "';";
		$result = mysqli_query($conexao, $query);
		$n_linhas = mysqli_num_rows($result);*/
	}	
?>