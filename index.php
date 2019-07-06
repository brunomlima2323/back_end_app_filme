<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>appFilme</title>
	</head>
	<body>
		<form method="POST" action="login.php">
			<div style="margin-left: 40%; margin-top: 20%;">
				<label for="usuario">Usuario:</label><br/>
				<input type="text" name="usuario" id="usuario"><br/>
				<label for="senha">Senha:</label><br/>
				<input type="password" name="senha" id="senha"><br/>
				<button type="submit">Enviar</button>
				<?php if(isset($_GET['erro'])){ ?>
					<div style="color: red;"> Usuário ou senha incorreta</div>
				<?php } ?>
			</div>
		</form>
	</body>
<html>