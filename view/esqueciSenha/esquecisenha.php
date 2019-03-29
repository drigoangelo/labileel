<?php
    
    require_once '../db/db_connect.php';


// Sessão
session_start();
    if(isset($_POST['enviar'])){
        $cpf = $_SESSION['cpf'] = $_POST['cpf'];
        $email = $_SESSION['email'] = $_POST['email'];
        $sql = "SELECT nome FROM dataset.tb_usuario WHERE email = '$email' and cpf = '$cpf'";
        $row = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($row) > 0 ) {
            header('Location:./definicao.html');
        }
            else{
            echo "Por favor, confira os dados e tente novamente. Caso o problema persista, entre em contato com o ILEEL.";
    }
}
?>