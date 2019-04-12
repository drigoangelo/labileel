<?php
	require_once './db/db_connect.php';
	require_once './modelo/Usuario.php';
	
	$usuario = new Usuario;
	$usuario->conn = $conn;
	
	session_start();
	
	if ($usuario->validar_senha($_SESSION['cpf'], $_SESSION['senha'])) {
		header('Location:./escolherModulos/escolherModulos.php');
	} else {
		header('Location:./login/');
	}
?>