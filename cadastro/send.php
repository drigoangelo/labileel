<?php

// Conexão
require_once '../db/db_connect.php';
require_once '../modelo/Usuario.php';

// Sessão
session_start();

if (isset($_POST['btn'])) {

	$socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
	if ($socket) {
		if (fwrite($socket, chr(bindec('00' . sprintf('%03d', decbin(3)) . '011')) . str_repeat(chr(0x0), 39) . pack('N', time()) . pack("N", 0))) {
			stream_set_timeout($socket, 1);
			$unpack0 = unpack("N12", fread($socket, 48));
			$dt_cadastro = date('Y-m-d', $unpack0[7]);
		}
		fclose($socket);
	}

	$erros = array();
	$usr = new Usuario;

	$usr->nome = mysqli_escape_string($conn, $_POST['nome']);
	$usr->sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
	$usr->cpf = mysqli_escape_string($conn, $_POST['cpf']);
	$usr->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$usr->email = mysqli_escape_string($conn, $_POST['email1']);
	//$email12 = mysqli_escape_string($conn,$_POST['email2']);
	//$email = $email1;
	$usr->dt_nascimento = mysqli_escape_string($conn, $_POST['nascimento']);
	if (mysqli_escape_string($conn, $_POST['sexo']) == 'Masculino') {
		$usr->sexo = 'Masculino';
	} else {
		if (mysqli_escape_string($conn, $_POST['sexo']) == 'Feminino') {
			$usr->sexo = 'Feminino';
		} else {
			$usr->sexo = mysqli_escape_string($conn, $_POST['outro']);
		}
	}

	$usr->nacionalidade = mysqli_escape_string($conn, $_POST['nacionalidade']);
	$usr->cidade = mysqli_escape_string($conn, $_POST['cidade']);
	$usr->estado = mysqli_escape_string($conn, $_POST['uf']);

	$usr->conn = $conn;
	$res = $usr->save();

	if (gettype($res) == 'string') {
		echo $res;
	} else if ($res) {
		$_SESSION['cpf'] = $_POST['cpf'];
		$_SESSION['senha'] = $_POST['senha'];
		header('Location: ../');
	} else {
		echo "Erro: Por favor, insira novamente os dados cadastrais! Caso o erro persista contate o ILEEL.";
	}
}
?>
