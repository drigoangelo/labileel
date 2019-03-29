<?php namespace Labileel\Model;

class Video extends CI_Model {
    public int $id;
    public int $id_usuario;
    public int $id_video;
    public string $caminho_video;

	public function get_next_video($user) {
		$unwatched_videos = $this->get_unwatched_videos($user);
		$idx = stats_rand_gen_iuniform(0, $sizeof($unwatched_videos) - 1);
		return $unwatched_videos[$idx];
	}

	public function get_unwatched_videos($user) {
        $query = 'select v.* 
                from tb_video v
                    left outer join tb_envio e on v.id = e.id_video and e.id_usuario = ?
                where e.id is null'
		return $this->db->query($query, arrau($user->id));
	}
}
