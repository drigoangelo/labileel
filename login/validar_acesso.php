<?php

    // Sessão
    session_start();

    // Conexão
    require_once '../db/db_connect.php';

    //MYSQL
    if(isset($_POST['btn'])){
      $erros = array();
      $cpf = mysqli_escape_string($conn,$_POST['cpf']);
      $senha = md5(mysqli_escape_string($conn,$_POST['senha']));
      //$cpf = ($_POST['cpf']);
      //$senha = md5($_POST['senha']);
      $sql = "SELECT nome FROM dataset.tb_usuario WHERE cpf = '$cpf' AND senha = '$senha' ";
      $row = mysqli_query($conn,$sql);
      
      if(mysqli_num_rows($row) > 0){
        $_SESSION['cpf'] = $cpf;
        $_SESSION['senha'] = $senha;
        header('Location: ../escolherModulos/escolherModulos.php');
        
      }
      else{
        header('Location: ../login/index.php?erro=1');
      
      }      
    }
      ?>