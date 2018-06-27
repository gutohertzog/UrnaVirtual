<?php

require_once 'init.php';

// verifica se o usuário está logado
if (!isLoggedIn())
{
	header('Location: form-login.php');
}
