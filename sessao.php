<?php

include('concecta.php');
// chama a sessão para verificar a validade do login
session_start();

// pega da variável sessão o login_user atual
$verifica_user = $_SESSION['login_user'];

// busca no banco o usuário
$query = "select cod_aluno from USUARIO where cod_aluno = ;";
$stmt = $DBcon->prepare($query);
// converte para int para evitar sqlinjection
$stmt->bind_param((int)$verifica_user);

$stmt->execute();
$row = $stmt->FETCH(PDO::FETCH_ASSOC);

$login_session = $row['cod_aluno'];

// se não houver sessão, volta a página inicial
if( !isset($_SESSION['login_user']) ){
	header("location:index.php");
}
