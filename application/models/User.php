<?php namespace Labileel\Model;

class User extends CI_Model {
    public int $id;
    public string $nome;
    public string $cpf;
    public string $senha;
    public string $email;
    public date $dt_nascimento;
    public string $nacionalidade;
    public string $cidade;
    public string $estado;

}
