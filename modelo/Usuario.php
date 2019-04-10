<?php

class Usuario {

    public $id;
    public $cpf;
    public $nome;
    public $sobrenome;
    public $senha;
    public $email;
    public $dt_nascimento;
    public $sexo;
    public $nacionalidade;
    public $cidade;
    public $estado;

    public $conn;

    public function save() {



                $sql = "INSERT INTO dataset.tb_usuario(nome, sobrenome, cpf, senha, email, dt_nascimento, sexo, nacionalidade, cidade, estado)
                        VALUES('$this->nome','$this->sobrenome','$this->cpf','$this->senha','$this->email','$this->dt_nascimento','$this->sexo','$this->nacionalidade','$this->cidade','$this->estado');";
                $resultado = mysqli_query($this->conn, $sql);
                return $resultado;
    }

    private function validar_usuario($usuario) {

        $sql = " select * from dataset.tb_usuario where cpf = '$usuario->cpf' ";
        $resultado = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return ' CPF ou ID já cadastrado, por favor verifique seu acesso!';
        }

        $sql = " select * from dataset.tb_usuario where email = '$usuario->email' ";
        $resultado = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultado) > 0){
                return ' e-mail já cadastrado, por favor verifique seu acesso!';
        }

        if($usuario->idade < 18){ //Verifica se o usuário tem 18 anos ou mais
                return 'Sua idade é inadequada, é necessário ter 18 anos completos! Sinto muito!';
        }

        return true;

    }

    function validar_senha($cpf, $senha) {
        $sql = "SELECT senha FROM dataset.tb_usuario WHERE cpf = '$cpf'";
        $res = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            $res->data_seek(0);
            $row = $res->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                return true;
            }
        }
        return false;
    }

    function buscar($cpf) {
        $sql = "SELECT id, cpf, nome, sobrenome, email, dt_nascimento, sexo, nacionalidade, cidade, estado
                FROM dataset.tb_usuario
                WHERE cpf = '{$cpf}'";
        $res = mysqli_query($this->conn, $sql);

        $resultado = new Usuario;

        if (mysqli_num_rows($res) > 0) {
            $res->data_seek(0);
            if ($row = $res->fetch_assoc()) {
                $resultado->id = $row['id'];
                $resultado->cpf = $row['cpf'];
                $resultado->nome = $row['nome'];
                $resultado->sobrenome = $row['sobrenome'];
                $resultado->email = $row['email'];
                $resultado->sexo = $row['sexo'];
                $resultado->dt_nascimento = $row['dt_nascimento'];
                $resultado->nacionalidade = $row['nacionalidade'];
                $resultado->cidade = $row['cidade'];
                $resultado->estado = $row['estado'];
                $resultado->conn = $this->conn;
            }
        }
        return $resultado;
    }
}
