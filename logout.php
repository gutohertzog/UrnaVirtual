<?php

// chama a sessão para finalizar
session_start();

// finaliza a sessão
if(session_destroy()) {
	header("Location: index.php");
}
