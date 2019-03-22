<?php


require_once '../db/db_connect.php';

session_start();
if(!isset($_SESSION['cpf'])){   
    echo 'Algo errado!';
}

    if(isset($_POST['ok'])){
        $cpf =  $_SESSION['cpf'];
        $novaSenha1 = md5($_POST['novaSenha1']);
        $novaSenha2 = md5($_POST['novaSenha2']);
        if($novaSenha1 == $novaSenha2){
        $sql = "UPDATE dataset.tb_usuario SET senha = '$novaSenha1' WHERE cpf = '$cpf'";
        $row = mysqli_query($conn,$sql);
        
        if($row) {
            header('Location: ../login/');
        }
            else{
            echo "Por favor, confira os dados e tente novamente. Caso o problema persista, entre em contato com o ILEEL.";
    }
}else
    echo 'As senhas são diferentes, por favor tente novamente!';
}


?>