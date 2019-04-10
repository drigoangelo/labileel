<?php

class Video {
	const ENVIO_STATUS_INICIADO = 1;
	const ENVIO_STATUS_CONCLUIDO = 2;

	public $id;
	public $id_modulo;
	public $num_video;
	public $nome;
	public $caminho_video;
	public $caminho_legenda;

	public $conn;

	public function video_atual($usuario) {
		$video_iniciado = $this->video_iniciado($usuario);
		if ($video_iniciado->id != null) {
			return $video_iniciado;
		}

		$videos_nao_assistidos = $this->videos_nao_assistidos($usuario);

		if (sizeof($videos_nao_assistidos) > 0) {
			$idx = mt_rand(0, sizeof($videos_nao_assistidos) - 1);
			$video = $videos_nao_assistidos[$idx];
			$this->salvar_envio($usuario, $video);

			return $video;
		}

		return new Video;
	}

	public function video_iniciado($usuario) {
		$sql = "SELECT v.*
                FROM tb_video v
                    INNER JOIN tb_envio e on v.id = e.id_video
                    INNER JOIN tb_usuario u on e.id_usuario = u.id
                WHERE e.status = " . ENVIO_STATUS_INICIADO . "
                    u.cpf = '{$usuario->cpf}'";
		$res = mysqli_query($this->conn, $sql);

		$vid = new Video;

		if ($res->num_rows > 0) {
			$res->data_seek(0);
			if ($row = $res->fetch_assoc()) {
				$vid->id = $row['id'];
				$vid->id_modulo = $row['id_modulo'];
				$vid->num_video = $row['num_video'];
				$vid->nome = $row['nome'];
				$vid->caminho_video = $row['caminho_video'];
				$vid->caminho_legenda = $row['caminho_legenda'];
			}
		}
		return $vid;
	}

	public function videos_nao_assistidos($usuario) {
		$sql = "SELECT v.*
                FROM tb_video v
                    INNER JOIN tb_modulo m on v.id_modulo = m.id
                    INNER JOIN tb_modulo_usuario mu on m.id = mu.id_modulo
                    INNER JOIN tb_usuario u on mu.id_usuario = u.id
                    LEFT OUTER JOIN tb_envio e on v.id = e.id_video AND e.id_usuario = u.id
                WHERE e.id is NULL
                    AND u.cpf = '{$usuario->cpf}'";
		$res = mysqli_query($this->conn, $sql);

		$resultado = array();
		if ($res->num_rows > 0) {
			$res->data_seek(0);
			while ($row = $res->fetch_assoc()) {
				$vid = new Video;
				$vid->id = $row['id'];
				$vid->id_modulo = $row['id_modulo'];
				$vid->num_video = $row['num_video'];
				$vid->nome = $row['nome'];
				$vid->caminho_video = $row['caminho_video'];
				$vid->caminho_legenda = $row['caminho_legenda'];
				array_push($resultado, $vid);
			}
		}

		return $resultado;
	}

	function buscar($id) {
		$sql = "SELECT v.*
                FROM tb_video v
                WHERE v.id = {$id}";

		$res = mysqli_query($this->conn, $sql);

		$vid = new Video;
		if ($res->num_rows > 0) {
			$res->data_seek(0);
			if ($row = $res->fetch_assoc()) {

				$vid->id = $row['id'];
				$vid->id_modulo = $row['id_modulo'];
				$vid->num_video = $row['num_video'];
				$vid->nome = $row['nome'];
				$vid->caminho_video = $row['caminho_video'];
				$vid->caminho_legenda = $row['caminho_legenda'];
				//$vid->conn = $this->conn;
			}
		}

		return $vid;
	}

	function contarVideos() {
		$sql = "SELECT COUNT(*)
                FROM dataset.tb_video;";

		$res = mysqli_query($this->conn, $sql);

		if ($row = $res->fetch_assoc()){
			$total = $row['COUNT(*)'];
		}
		return $total;
	}

	function contarVideosFeitos($id) {
		$sql = "SELECT COUNT(*)
				FROM dataset.tb_envio
				WHERE id = {$id};";

		$res = mysqli_query($this->conn, $sql);

		if ($row = $res->fetch_assoc()){
			$total = $row['COUNT(*)'];
		}
		return $total;
	}

	function salvar_envio($video, $usuario) {
		$sql = "INSERT INTO dataset.tb_envio(id_video, id_usuario, status)
                VALUES('$video->id','$usuario->id', " . ENVIO_STATUS_INICIADO . ");";
		echo $sql;
		$resultado = mysqli_query($this->conn, $sql);
		return $resultado;
	}
}