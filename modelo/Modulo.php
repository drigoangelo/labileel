<?php
	class Modulo {
		const STATUS_INICIADO = 1;
		const STATUS_COMPLETO = 2;
	
		public $id;
		public $nome;
		public $descricao;
	
		public $conn;
	
		public function modulo_atual($usuario) {
			$sql = "SELECT m.id, m.nome, m.descricao
	                FROM tb_modulo m
	                    INNER JOIN tb_modulo_usuario mu on m.id = mu.id_modulo
	                    INNER JOIN tb_usuario u on mu.id_usuario = u.id
	                WHERE u.cpf= '{$usuario->cpf}'
	                    AND mu.status = " . Modulo::STATUS_INICIADO . ";";
			$res = mysqli_query($this->conn, $sql);
		
			$m = new Modulo;
			if ($res->num_rows > 0) {
				$res->data_seek(0);
				if ($row = $res->fetch_assoc()) {
					$m->id = $row['id'];
					$m->nome = $row['nome'];
					$m->descricao = $row['descricao'];
					$m->conn = $this->conn;
				}
			}
			return $m;
		}
	
		function proximo_modulo($usuario) {
			$sql = "SELECT m.id, m.nome, m.descricao, count(mu.id)
	                FROM tb_modulo m
	                    LEFT JOIN tb_modulo_usuario mu on m.id = mu.id_modulo
	                WHERE m.id not in (SELECT mu2.id_modulo
	                                    FROM tb_modulo_usuario mu2
	                                        inner join tb_usuario u ON mu2.id_usuario = u.id
	                                    WHERE u.cpf = {$usuario->cpf})
	                GROUP BY m.id, m.nome, m.descricao
	                ORDER BY count(mu.id) ASC, m.id ASC;";
			$res = mysqli_query($this->conn, $sql);
		
			$m = new Modulo;
			if ($res->num_rows > 0) {
				$res->data_seek(0);
				if ($row = $res->fetch_assoc()) {
					$m->id = $row['id'];
					$m->nome = $row['nome'];
					$m->descricao = $row['descricao'];
					$m->conn = $this->conn;
				
					$this->salvar_modulo_usuario($m, $usuario);
				}
			}
			return $m;
		}
	
		function salvar_modulo_usuario($m, $usuario) {
			$sql = "INSERT INTO dataset.tb_modulo_usuario(id_modulo, id_usuario, status)
	                VALUES({$m->id}, {$usuario->id}, " . Modulo::STATUS_INICIADO . ");";
			$resultado = mysqli_query($this->conn, $sql);
			return $resultado;
		}
	}