<?php

    // Conexão
    require_once '../db/db_connect.php';

    // Sessão
    session_start();

    $id = $_GET['id'];

    $sql = "SELECT modAtual FROM dataset.tb_usuario WHERE cpf='" . $_SESSION['cpf'] . "';";

        if($resultado = mysqli_query($conn, $sql)){ //Verifica se a coneção deu certo
            $atual = mysqli_fetch_array($resultado); //Salva em uma variavel o módulo sendo feito atualmente
        }else{
            echo 'Erro ao conectar com o banco de dados!\n'; //Adicione aqui uma mensagem de erro
        }

    if($atual[0] == $id){ //Verifica se está em processo de analize, se já acabou tudo e se o módulo passado é o atual

    //Atualiza o modAtual para 13, indicando que o usuário já terminou todos os módulos
    $sql0 = "SELECT videoAtual FROM dataset.tb_usuario WHERE cpf='" . $_SESSION['cpf'] . "';";

    if($resultado0 = mysqli_query($conn, $sql0)){ //Verifica se a coneção deu certo
        $quantidade = mysqli_fetch_array($resultado0); //Salva a quantidade de videos
    }else{
        echo 'Erro ao conectar com o banco de dados!\n'; //Adicione aqui uma mensagem de erro
    }

    //Atualiza o modAtual para 13, indicando que o usuário já terminou todos os módulos
    $sql1 = "UPDATE dataset.tb_usuario SET videoAtual= (" . $quantidade[0] . "+1) WHERE cpf='" . $_SESSION['cpf'] . "';";

    if($resultado1 = mysqli_query($conn, $sql1)){ //Verifica se a coneção deu certo
    }else{
        echo 'Erro ao conectar com o banco de dados!\n'; //Adicione aqui uma mensagem de erro
    }
    } else {
        header("Location: escolherModulos.php"); //Vai para a página de seleção de módulos
    }
?>