<?php

// Conexão
require_once '../db/db_connect.php';
require_once '../modelo/Usuario.php';

// Sessão
session_start();

if (isset($_POST['btn'])) {




	$erros = array();
	$usr = new Usuario;

	$usr->nome = mysqli_escape_string($conn, $_POST['nome']);
	// $usr->sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
	//$usr->cpf = mysqli_escape_string($conn, $_POST['cpf']);
		  if(($_POST['cpf']) != ""? $cpf = $_POST['cpf'] : $cpf = $_POST['ID']);
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

    //verificar se o cpf ja existe
    $sql1 = " select * from dataset.tb_usuario where cpf = '$cpf' ";
    $resultado = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($resultado) > 0){
       echo ' CPF já cadastrado, por favor utilize outro CPF!';
    }
    else{
        //verificar se o e-mail ja existe
    $sql1 = " select * from dataset.tb_usuario where email = '$email' ";
    $resultado = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($resultado) > 0){


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
