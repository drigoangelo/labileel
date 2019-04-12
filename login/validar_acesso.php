<?php

	// Sessão
	session_start();
	
	// Conexão
	require_once '../db/db_connect.php';
	require_once '../modelo/Usuario.php';
	
	$usuario = new Usuario;
	$usuario->conn = $conn;
	
	//MYSQL
	if (isset($_POST['btn'])) {
		$erros = array();
		$cpf = mysqli_escape_string($conn, $_POST['cpf']);
		$senha = $_POST['senha'];
	
		if ($usuario->validar_senha($cpf, $senha)) {
			$_SESSION['cpf'] = $cpf;
			$_SESSION['senha'] = $senha;
			header('Location: ../escolherModulos/escolherModulos.php');
		} else {
			header('Location: ../login/index.php?erro=1');
		}
	}
?>