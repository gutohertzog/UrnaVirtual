<?php
require_once 'conecta.php';

$query = "select titulo, data_inicio, data_fim from VOTACAO where id_votacao = 1";
$stmt = $DBcon->prepare($query);
$stmt->execute();
$row = $stmt->FETCH(PDO::FETCH_ASSOC);
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
	<img id="logo" src="images/ifrs_logo_completo.jpg" alt="IFRS">
	
	<h4 class="text-center" id="index_titulo"><?php echo $row["titulo"];?></h4>

	<p class="text-center">Período para votação</p>
	<p class="text-center">
		<?php
		$phpdate = strtotime( $row["data_inicio"] );
		echo date( 'd/m/Y H:i:s', $phpdate );
		?> até <?php
		$phpdate = strtotime( $row["data_fim"] );
		echo date( 'd/m/Y H:i:s', $phpdate );
		?>
	</p>
	<br>
	<div id="index_button">
		<a type="button" class="btn btn-primary btn-lg btn-block text-dark" href="login.php">VOTAR</a>
	</div>
</body>
</html>



<!-- http://blog.ultimatephp.com.br/sistema-de-login-php/ -->

<!--
	check.php: protege scripts, impedindo acesso por visitantes não logados
	form-login.php: formulário de login
	functions.php: arquivo com funções que usaremos em nosso sistema de login
	index.php: página inicial
	init.php: arquivo de inicialização, onde vamos definir constantes e outras configurações gerais
	login.php: script que verifica os dados de login fornecidos no formulário
	logout.php: script para fazer logout
	panel.php: painel do usuário
-->