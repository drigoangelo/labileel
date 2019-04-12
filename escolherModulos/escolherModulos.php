<?php

	require_once '../db/db_connect.php';
	require_once '../modelo/Modulo.php';
	require_once '../modelo/Usuario.php';
	
	function escolher_proximo_modulo($conn) {
		$modulo = new Modulo;
		$modulo->conn = $conn;
	
		// Sessão
		session_start();
		$usuario = new Usuario;
		$usuario->conn = $conn;
		$usuario = $usuario->buscar($_SESSION['cpf']);
		$error = false;
	
		$modulo_atual = $modulo->modulo_atual($usuario);
		if ($modulo_atual->id > 0) // Encontrou módulo atual
		{
			return 'Location: ../gravacao/';
		
		} else {
			// Não tem módulo atual, procurar proximo modulo
		
			$proximo_modulo = $modulo->proximo_modulo($usuario);
			if ($proximo_modulo->id == null) {
				return 'Location: terminou.php';
			} else {
				return 'Location: ../gravacao/';
			}
		
		}
	}
	
	header(escolher_proximo_modulo($conn));
	
?>