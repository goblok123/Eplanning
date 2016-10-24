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

//OBAT
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

//JENIS SDM
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

//BPH
	function add_bhp(){
		$new_insert_data = array(
			'nama_bhp' => $this->input->post('nama_bhp'),
			'id_kode' => $this->input->post('kode_bhp'),
		);

		$insert = $this->db->insert('bhp', $new_insert_data);
		return $insert;
	}

	function check_if_bhp_exists($nama){
		$this->db->where('nama_bhp', $nama);
		$result = $this->db->get('bhp');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_bhp(){
		$query = $this->db->query("SELECT id_kode, nama_bhp from bhp");
   		return $query->result();
	}

	function find_all_jenis_bhp(){
		$query = $this->db->query("SELECT id_kode, nama_jenis_bhp from kode_jenis_bhp");
   		return $query->result();
	}

	function find_jenis_bhp($b){
		$query = $this->db->query("SELECT nama_jenis_bhp from kode_jenis_bhp where id_kode = '$b' ");
   		return $query->row();
	}

//Alat
	function add_alat(){
		$new_insert_data = array(
			'nama_alat_kes_dan_non' => $this->input->post('nama_alat'),
			'jenis_alat' => $this->input->post('alat'),
		);

		$insert = $this->db->insert('alat_kes_dan_non', $new_insert_data);
		return $insert;
	}

	function check_if_alat_exists($nama){
		$this->db->where('nama_alat_kes_dan_non', $nama);
		$result = $this->db->get('alat_kes_dan_non');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_alat(){
		$query = $this->db->query("SELECT nama_alat_kes_dan_non, jenis_alat from alat_kes_dan_non");
   		return $query->result();
	}


//Gedung
	function add_gedung(){
		$new_insert_data = array(
			'nama_gedung' => $this->input->post('nama_gedung'),
		);

		$insert = $this->db->insert('gedung', $new_insert_data);
		return $insert;
	}

	function check_if_gedung_exists($nama){
		$this->db->where('nama_gedung', $nama);
		$result = $this->db->get('gedung');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_gedung(){
		$query = $this->db->query("SELECT nama_gedung from gedung");
   		return $query->result();
	}

//Item Keuangan
	function add_item_keu(){
		$new_insert_data = array(
			'nama_item_keu' => $this->input->post('nama_item_keu'),
			'jenis_item_keu' => $this->input->post('jenis_item_keu'),
		);

		$insert = $this->db->insert('item_keuangan', $new_insert_data);
		return $insert;
	}

	function check_if_item_keu_exists($nama){
		$this->db->where('nama_item_keu', $nama);
		$result = $this->db->get('item_keuangan');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function find_all_item_keu(){
		$query = $this->db->query("SELECT nama_item_keu, jenis_item_keu from item_keuangan");
   		return $query->result();
	}

}
?>