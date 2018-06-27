<?php
// inclui o arquivo de inicialização
require 'init.php';

if (isset($_REQUEST['cod_aluno']) && $_REQUEST['password']){

	// resgata variáveis do formulário
	$cod_aluno = isset($_REQUEST['cod_aluno']) ? $_REQUEST['cod_aluno'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

	$cod_aluno = (int)$cod_aluno;

	if (empty($cod_aluno) || empty($password))
	{
		echo "Informe o usuário e senha";
		exit;
	}

	// cria o hash da senha
	// $passwordHash = make_hash($password);

	$PDO = db_connect();

	$sql = "SELECT cod_aluno, nome FROM USUARIO WHERE cod_aluno = :cod_aluno AND senha = :password";
	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':cod_aluno', $cod_aluno);
	$stmt->bindParam(':password', $password);

	$stmt->execute();

	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	var_dump($users);

	if (count($users) <= 0)
	{
		echo "<script language='javascript'>
			alert('Email ou senha incorretos')
			window.location.href='/UrnaVirtual/login.php'
			</script>";
	}

	// pega o primeiro usuário
	$user = $users[0];

	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['user_id'] = $user['cod_aluno'];
	$_SESSION['user_name'] = $user['nome'];

	// header('Location: index.php');
}



?>

<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8" /> -->
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Urna Virtual</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/urna.jpg">

	<!-- JQUERY -->
	<script src="libs/js/jquery-3.3.1.js"></script>

	<!-- POPPER -->
	<script src="libs/js/popper.js"></script>

	<!-- BOOTSTRAP v4.1 -->
	<link rel="stylesheet" type="text/css" media="screen" href="libs/bootstrap-4.1.1/css/bootstrap.css" />
	<script src="libs/bootstrap-4.1.1/js/bootstrap.js"></script>

	<!-- ANGULARJS -->
	<script src="libs/angular-1.6.10/angular.js"></script>

	<!-- arquivos de configuração personalizados -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<!-- <script src="main.js"></script> -->
</head>
<body id="wrapper">

	<form action="login.php" method="get">
	<table>
		<tr>
			<td><label for="cod_aluno">Usuário: </label></td>
			<td><input type="text" name="cod_aluno" id="cod_aluno"></td>
		</tr>
		<tr>
			<td><label for="password">Senha: </label></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
	</table>
	<input type="submit" value="Entrar">
	</form>
</body>
</html>
