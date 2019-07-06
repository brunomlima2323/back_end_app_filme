<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json");
	require_once('conexao.php');

	if(!isset($_POST['usuario_id']) || empty($_POST['usuario_id']) || !isset($_POST['filme_id']) || empty($_POST['filme_id'])){
		echo "Não foram passados os parametros necessários";
	}else{
		$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
		$filme_id = mysqli_real_escape_string($conexao, $_POST['filme_id']);
		
		//$query = "insert into usuarios_filmes values('null'," . $_POST['usuario_id'] . "," . $_POST['filme_id'] . ");";
		
		$query = "select nome from filmes where id = '" . $filme_id . "';";
		$result = mysqli_query($conexao, $query);
		$n_linhas = mysqli_num_rows($result);
		
		//Verifica se o filme que o usuario deseja favoritar já existe no banco
		if ($n_linhas == 0){
			//filmes não existe no banco de dados, precisa cadastrar antes
			echo "filme não existe no banco de dados, precisa cadastrar antes";
			$query = "insert into filmes values('". $filme_id ."', 'filmeteste');";
			$result = mysqli_query($conexao, $query);
			echo json_encode($result);
		}else{
			//filme já existe, precisa apenas fazer a ligação das tabelas
			echo "filme já existe, precisa apenas fazer a ligação das tabelas";
		}

		
		//verifica se o filme já está favoritado
		$query = "select * from usuarios_filmes where idusuario = '" . $usuario_id . "' and idfilme = '" . $filme_id . "';";
		echo $query;
		$result = mysqli_query($conexao, $query);
		$linha = mysqli_num_rows($result);
		$n_linhas = mysqli_num_rows($result);
		if($n_linhas == 0){
			//filme não está favoritado para esse usuário, então precisa favoritar
			echo "filme não está favoritado para esse usuário, então precisa favoritar";
			//faz a ligações entre as tabelas para favoritar o filme
			$query = "insert into usuarios_filmes values(null,'" . $usuario_id . "','" . $filme_id . "');";
		}else{
			//filme já está favoritato para esse usuário, então precisa desfavoritar
			$retornobanco = mysqli_fetch_assoc($result);
			$id_do_relacionamento = $retornobanco['id'];
			echo json_encode($retornobanco['id']);
			echo "filme já está favoritato para esse usuário, então precisa desfavoritar";
			$query = "delete from usuarios_filmes where id ='" . $id_do_relacionamento . "';";
		}
		echo " Ultima query: " . $query;
		$result = mysqli_query($conexao, $query);

		//$result = mysqli_query($conexao, $query);
		//echo json_encode($result);
		echo json_encode($query);
	}
?>