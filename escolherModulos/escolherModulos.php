<?php

// Conexão
require_once '../db/db_connect.php';
// Sessão
session_start();

$error = false;

//Comando sql que recebe o modulo atual
$sql0 = 'SELECT modAtual FROM dataset.tb_usuario WHERE cpf=' . $_SESSION['cpf'] . ';';

if($resultado0 = mysqli_query($conn, $sql0)){ //Verifica se a coneção deu certo
    $Atual = mysqli_fetch_array($resultado0); //Recebe o valor atual do usuario
}else{
    $error = true;
}

if($Atual[0] != 0) //Verifica se atual é diferente de zero, caso seja, significa que o trabalho no módulo ainda não acabou
{
    if($Atual[0] == 13) //Verifica se o Atual é igual a trze, nesse caso o processo já vai ter acabado e basta enviar uma mensagem de conluído
    {
        echo "Parabéns você completou todos os módulos!\n";
    }
    else{
    $location = 'Location: ../gravacao.' . $Atual[0] . '/'; //Prepara o caminho utilizando a posição atual
    header($location); //Envia para a página programada pelo caminho
    }
}
else{

    //Variaveis que vão guardar os valores
    $moduloAtual = 2;
    $menorModulo = 1;

    //Comando sql que recebe a quantidade do primeiro módulo
    $sql = 'SELECT quantidade FROM dataset.tb_modulos WHERE modulo=1;';

    if($resultado = mysqli_query($conn, $sql)){ //Verifica se a coneção deu certo
        $menorQuantidade = mysqli_fetch_array($resultado); //Salva em uma variavel a quantidade do modulo 1
    }else{
        $error = true;
    }

        //Essa parte verifica se o primeiro modulo já foi feito
        $sql3 = 'SELECT mod1 FROM dataset.tb_usuario WHERE cpf=' . $_SESSION['cpf'] . ';';

        if($resultado3 = mysqli_query($conn, $sql3)){ //Verifica se a coneção deu certo
            $verificar = mysqli_fetch_array($resultado3); //Salva em uma variavel se o módulo foi usado ou não
        }else{
            $error = true;
        }

    while($moduloAtual <= 12) //Repete o processo até analizar os doze módulos
    {
        //Para o modulo que vai ser analizado atualmente pega sua quantidade
        $sql2 = 'SELECT quantidade FROM dataset.tb_modulos WHERE modulo=' . $moduloAtual . ';';

        if($resultado2 = mysqli_query($conn, $sql2)){//Verifica se a coneção deu certo
            $quantidadeAtual = mysqli_fetch_array($resultado2); //Salva essa quantidade em uma variavel
        }else{
            $error = true;
        }

        //Essa parte verifica se o modulo atual já foi feito
        $sql4 = 'SELECT mod' . $moduloAtual . ' FROM dataset.tb_usuario WHERE cpf=' . $_SESSION['cpf'] . ';';

        if($resultado4 = mysqli_query($conn, $sql4)){ //Verifica se a coneção deu certo
            $verificar2 = mysqli_fetch_array($resultado4); //Salva se ele foi feito ou não
        }else{
            $error = true;
        }

        //Verifica muitas coisas, primeiro se o menor atual já foi utilizado, caso tenha sido entra no if, depois verifica se o próximo já foi utilizado, caso tenha sido, não entra e por último verifica se o pŕoximo tenha uma quantidade de usos menor, nesse caso ele será o utilizado, a ordem de preferência de uso é essa que foi falada.
        if($verificar[0] == 1 || ($menorQuantidade > $quantidadeAtual && $verificar2[0] == 0))
        {
            $menorQuantidade = $quantidadeAtual; //Atualiza a quantidade para a próxima se tornar a atual
            $menorModulo = $moduloAtual; //Atualiza o modulo para esse
    
            if($verificar[0] == true){ //Caso o que estava sendo analizado já tenha sido usado
                $verificar[0] = $verificar2[0]; //Atualiza esse valor analizado para o do próximo
            } 
        }
        $moduloAtual++; //Passa a analizar o próximo
    }

    if($verificar[0] == true) //Caso após analizar tudo, significa que todos já foram feitos.
    {
        //Atualiza o modAtual para 13, indicando que o usuário já terminou todos os módulos
        $sqlF = 'UPDATE dataset.tb_usuario SET modAtual=13 WHERE cpf=' . $_SESSION['cpf'] . ';';

        if($resultadoF = mysqli_query($conn, $sqlF)){ //Verifica se a coneção deu certo
        }else{
            $error = true;
        }

        echo "Parabéns você completou todos os módulos!"; //Mensagem que indica a finalização
    } else {

    $sql5 = 'UPDATE dataset.tb_usuario SET mod' . $menorModulo . ' = true WHERE cpf = ' . $_SESSION['cpf'] . ';'; //Muda o usuario atual para o módulo indicado como o sendo o que ele está fazendo atualmente
    if($resultado5 = mysqli_query($conn, $sql5)){
    }else{
        $error = true;
    }

    $sql6 = 'UPDATE dataset.tb_usuario SET modAtual = ' . $menorModulo . ' WHERE cpf = ' . $_SESSION['cpf'] . ';'; //Muda o usuario atual para o módulo indicado como o sendo o que ele está fazendo atualmente
    if($resultado6 = mysqli_query($conn, $sql6)){
    }else{
        $error = true;
    }

    $sql7 = 'UPDATE dataset.tb_modulos SET quantidade=quantidade+1 WHERE modulo=' . $menorModulo . ';'; //Atualiza a quantidade de pessoas fazendo aquele módulo
    if($resultado7 = mysqli_query($conn, $sql7)){
    }else{
        $error = true;
    }

    mysqli_close($conn); 

    if($error){
	echo 'Erro ao conectar com o banco de dados! Por favor, fa�a login novamente! Se o problema persistir contate ILEEL!'; 
	$location = 'Location: ../login/';
    } else{
        $location = 'Location: ../gravacao.' . $menorModulo . '/';
    }
    header($location);
    }
}
?>