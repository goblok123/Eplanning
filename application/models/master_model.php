<?php
class Master_model extends CI_Model{

	function addUnit(){
		$name_unit = $this->input->post('name_unit');

		$new_unit_insert_data = array(
			'name_unit' => $this->input->post('name_unit'),
		);

		$insert = $this->db->insert('unit', $new_unit_insert_data);
		return $insert;
	}

	function check_if_unit_exists($name_unit){
		$this->db->where('name_unit', $name_unit);
		$result = $this->db->get('unit');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

}
?>