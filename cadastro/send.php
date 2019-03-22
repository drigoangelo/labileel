<?php

// Conexão
require_once '../db/db_connect.php';


// Sessão
session_start();

if(isset($_POST['btn'])){



  $socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
  if ($socket)
  {
      if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
      {
          stream_set_timeout($socket, 1);
          $unpack0 = unpack("N12", fread($socket, 48));
          $dt_cadastro =  date('Y-m-d', $unpack0[7]);
      }
      fclose($socket);
  }

  $erros = array();

  $nome = mysqli_escape_string($conn,$_POST['nome']);
  $sobrenome = mysqli_escape_string($conn,$_POST['sobrenome']);
  $cpf = mysqli_escape_string($conn,$_POST['cpf']);
  $senha = md5(mysqli_escape_string($conn,$_POST['senha']));
  $email1 = mysqli_escape_string($conn,$_POST['email1']);
  //$email12 = mysqli_escape_string($conn,$_POST['email2']);
  $email = $email1;
  $dt_nascimento = mysqli_escape_string($conn,$_POST['nascimento']);
  if(mysqli_escape_string($conn,$_POST['sexo']) == 'Masculino'){
    $sexo = 'Masculino';
  }else{
    if(mysqli_escape_string($conn,$_POST['sexo']) == 'Feminino'){
        $sexo = 'Feminino';
    }
    else{
        $sexo = mysqli_escape_string($conn,$_POST['outro']);
}
}
  
  $nacionalidade = mysqli_escape_string($conn,$_POST['nacionalidade']);
  $cidade = mysqli_escape_string($conn,$_POST['cidade']);
  $estado = mysqli_escape_string($conn,$_POST['uf']);
  

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
        
       echo ' e-mail já cadastrado, por favor utilize outro CPF!';
    }else{
        $sql = "INSERT INTO dataset.tb_usuario(nome, sobrenome, cpf, senha, email, dt_nascimento, sexo, nacionalidade, cidade, estado, mod1, mod2, mod3, mod4, mod5, mod6, mod7, mod8, mod9, mod10, mod11, mod12, modAtual, videoAtual)
    VALUES('$nome','$sobrenome','$cpf','$senha','$email','$dt_nascimento','$sexo','$nacionalidade','$cidade','$estado', false, false, false, false, false, false, false, false, false, false, false, false, 0, 0);";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: ../login/');
    } else {
        echo "Error: Por favor, insira novamente os dados cadastrais! Caso o erro persista contate o ILEEL. ";
    }
    mysqli_close($conn);    
    }
}
}
?>
