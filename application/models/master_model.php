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

	function addObat(){
		$name_obat = $this->input->post('name_obat');

		$new_insert_data = array(
			'nama_obat' => $this->input->post('name_obat'),
		);

		$insert = $this->db->insert('obat', $new_insert_data);
		return $insert;
	}

	function check_if_obat_exists($name_obat){
		$this->db->where('nama_obat', $name_obat);
		$result = $this->db->get('obat');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_obat(){
		$query = $this->db->query("SELECT nama_obat from obat");
   		return $query->result();
	}

	//Jenis SDM
	function add_jenis_sdm(){
		$new_insert_data = array(
			'nama_sdm' => $this->input->post('jenis_sdm'),
		);

		$insert = $this->db->insert('jenis_sdm', $new_insert_data);
		return $insert;
	}

	function check_if_sdm_exists($nama_jenis){
		$this->db->where('nama_sdm', $nama_jenis);
		$result = $this->db->get('jenis_sdm');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_j_sdm(){
		$query = $this->db->query("SELECT nama_sdm from jenis_sdm");
   		return $query->result();
	}


}
?>