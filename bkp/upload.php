<?php
session_start();
require_once './db/db_connect.php';
if(!isset($_SESSION['cpf'])){
    header('Location: ../login/login.php?erro=1');
}

header("Access-Control-Allow-Origim: *");
    $cpf = $_SESSION['cpf'];
    $modulo = $_SESSION['modulo'];
    
	//Comando sql que recebe o modulo atual
	$sql0 = 'SELECT videoAtual FROM dataset.tb_usuario WHERE cpf=' . $_SESSION['cpf'] . ';';

	if($resultado0 = mysqli_query($conn, $sql0)){ //Verifica se a coneção deu certo
    		$Atual = mysqli_fetch_array($resultado0); //Recebe o valor atual do usuario
	}else{
    		echo 'Erro ao conectar com o banco de dados!\n'; //Adicione aqui uma mensagem de erro
	}

	$conteudo = $Atual[0] + 1;

    $var_armazenamento = "videos/".$cpf."_".$modulo."_".$conteudo.".webm";
    file_put_contents($var_armazenamento, file_get_contents($_FILES['blob']['tmp_name']));
    $caminho = "videos/".$modulo."_".$conteudo.".webm";
    $sql = "INSERT INTO dataset.tb_videos(cpf,caminho) VALUES ('$cpf','$caminho')";
    mysqli_query($conn,$sql);
      
      

?>
