<?php
require_once 'init.php';

try{
	// para buscar no banco com as acentuações como deve ser
	$opcoes = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
	);

	$DBcon = new PDO(
		'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
		DB_USER, DB_PASS, $opcoes);
	$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Erro ao conetar: ".$e->getMessage();
}
