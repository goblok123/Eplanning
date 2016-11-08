<?php
class Membership_model extends CI_Model{

	function validate(){

		$this->db->where('username', $this->input->post('username'));
		$this->db->where('pass', $this->input->post('password'));
		$result = $this->db->get('users');


		if($result->num_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function create_member(){
		$username = $this->input->post('username');

		$new_member_insert_data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'access' => $this->input->post('hakAkses'),
			'id_unit' => $this->input->post('unit'),
			'pass' => $this->input->post('password')
		);

		$insert = $this->db->insert('users', $new_member_insert_data);
		return $insert;
	}

	function check_if_username_exists($username){
		$this->db->where('username', $username);
		$result = $this->db->get('users');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	// function check_if_email_exists($email){
	// 	$this->db->where('email', $email);
	// 	$result = $this->db->get('users');

	// 	if($result->num_rows() > 0){
	// 		return FALSE;
	// 	}else{
	// 		return TRUE;
	// 	}
	// }

	function find_all_unit(){
		$result = $this->db->query("SELECT id_unit, name_unit from unit");
   		return $result->row();
	}

	function find_for_sesion($username1){
		$result = $this->db->query("SELECT id_user, id_unit, access from users where username = '$username1' ");

   		return $result->row();
	}

	function find_unit($u){
		$result = $this->db->query("SELECT name_unit from unit where id_unit = '$u' ");

   		return $result->row();
	}
}
?>