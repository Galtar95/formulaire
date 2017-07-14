<?php

class Site_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function create($data)
	{
		$this->db->insert('user', $data);
	}

	function read()
	{
		$users = $this->db->get('user');
		if ($users->num_rows() > 0)
		{
			foreach ($users->result() as $user) {
				$data[] = $user;
			}
			return $data;
		}
	}

	function check_id($mail, $mdp)
	{
		$this->db->where('mail', $mail);
		$this->db->where('mdp', hash('sha256', $mdp));
		$user = $this->db->get('user');
		if ($user->num_rows() > 0)
		{
			return true;
		}
	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	function get_user($id)
	{
		$this->db->where('id', $id);
		$user = $this->db->get('user');
		if ($user->num_rows() > 0)
		{
			$row = $user->row();
			return $row;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	function get_user_infos($mail)
	{
		$this->db->where('mail', $mail);
		$user = $this->db->get('user');
		if ($user->num_rows() > 0)
		{
			$row = $user->row();
			return $row;
		}
	}
}

?>