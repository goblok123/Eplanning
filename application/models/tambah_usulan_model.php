<?php
class Tambah_usulan_model extends CI_Model{
	// function find_all_data_diklat($id_usulan){
	// 	$q = $this->db->query("SELECT * from dtl_usulan_diklat where id_dtl = '$id_usulan'");
 //   		return $q->row();
	// }

	function find_usulan_diklat($unit, $t){
		$q = $this->db->query("Select * from dtl_usulan_diklat where id_usulan = (Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1')");
   		return $q->result();
		// return null;
	}

	function find_id_usulan($unit, $t){
		$q = $this->db->query("Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1'");

		return $q->row();
	}

	function there_usul($unit, $t){
		$result = $this->db->query("Select id_unit from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1'");

		if($result->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	// function find_id_detail_usulan($unit){
	// 	$q = $this->db->query("Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1')");
	// 	return $q->row();
	// }

	function make_id_usulan($dataUsulan){
		$new_insert_data = array(
			'tgl_diketahui' => date('Y-m-d',1970-01-01),
			'id_pemasuk' => $dataUsulan["id_pemasuk"],
			'id_terakhir_penyimpan' => $dataUsulan["id_pemasuk"],
			'id_unit' => $dataUsulan["id_unit"],
			'type_usulan' => $dataUsulan["type_usulan"],
		);

		$this->db->set('tgl_dimasukkan', 'NOW()', FALSE);
		$this->db->set('tgl_terakhir_dirubah', 'NOW()', FALSE);

		$insert = $this->db->insert('usulan', $new_insert_data);
		return $insert;
	}



	function add_usulan_diklat($id){
		$new_insert_data = array(
			'id_usulan' => $id,
			'nama_diklat' => $this->input->post('nama_diklat'),
			'jmlh_sdm_pernah' => $this->input->post('jmlh_sdm_pernah'),
			'jmlh_sdm_belum' => $this->input->post('jmlh_sdm_belum'),
			'jmlh_sdm_usul' => $this->input->post('jmlh_sdm_usul'),
			'justifikasi' => $this->input->post('justifikasi'),
			'catatan' => $this->input->post('catatan'),
		);

		$insert = $this->db->insert('dtl_usulan_diklat', $new_insert_data);
		return $insert;
	}

	function update_usulan($id_user, $id_usu){
		$result = $this->db->query("Update usulan SET tgl_terakhir_dirubah = NOW(), id_terakhir_penyimpan = '$id_user' WHERE id_usulan = '$id_usu'");
	}

	function find_detail_usulan($id){
		$q = $this->db->query("Select * from dtl_usulan_diklat where id_dtl = '$id'");
   		return $q->row();
	}

	function rubah_usulan_all($id){
		// $new_insert_data = array(
		// 	'nama_diklat' => $this->input->post('nama_diklat'),
		// 	'jmlh_sdm_pernah' => $this->input->post('jmlh_sdm_pernah'),
		// 	'jmlh_sdm_belum' => $this->input->post('jmlh_sdm_belum'),
		// 	'jmlh_sdm_usul' => $this->input->post('jmlh_sdm_usul'),
		// 	'justifikasi' => $this->input->post('justifikasi'),
		// 	'catatan' => $this->input->post('catatan'),
		// );
		$a = $this->input->post('nama_diklat');
		$b = $this->input->post('jmlh_sdm_pernah');
		$c = $this->input->post('jmlh_sdm_belum');
		$d = $this->input->post('jmlh_sdm_belum');
		$e = $this->input->post('justifikasi');
		$f = $this->input->post('catatan');

		$result = $this->db->query("Update dtl_usulan_diklat SET nama_diklat = '$a', jmlh_sdm_pernah = '$b',
			jmlh_sdm_belum = '$c',
			jmlh_sdm_usul = '$d',
			justifikasi = '$e',
			catatan = '$f'
			WHERE id_dtl = '$id'");

		return $result;
	}

	function hapus_usulan_diklat($id){
		$this->db->query("delete from dtl_usulan_diklat where id_dtl = '$id' ");
	}


//Obat
	function find_id_obat($nama_obat){
		$find = $this->db->query("Select id_obat from obat where nama_obat = '$nama_obat' AND active_status_obat = '1'");
		return $find->row();
	}

	function add_usulan_obat($id_usulan,$id_obat){
		$t = $this->input->post('nama_obat');

		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_obat' => $id_obat,
			'jmlh_yg_diusulkan' => $this->input->post('jmlh_yg_diusulkan'),
			'satuan' => $this->input->post('satuan'),
			'hrg_satuan' => $this->input->post('hrg_satuan'),
			'jmlh_harga' => $this->input->post('jmlh_harga'),
			'merk' => $this->input->post('merk'),
			'jmlh_pnggnaan_thn_sblm' => $this->input->post('jmlh_pnggnaan_thn_sblm'),
		);

		$insert = $this->db->insert('dtl_usulan_obat', $new_insert_data);
		return $insert;
	}

	function find_all_obat(){
		$q = $this->db->query("Select id_obat, nama_obat from obat where active_status_obat = '1'");
   		return $q->result();
	}

	function check_obat($id){
		$q = $this->db->query("Select id_obat from dtl_usulan_obat where id_obat = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function all_usulan_obat($unit, $t){
		$q = $this->db->query("Select * from dtl_usulan_obat where id_usulan = (Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1')");
   		return $q->result();
		// return null;
	}

	function find_detail_usulan_obat($id){
		$q = $this->db->query("Select * from dtl_usulan_obat where id_dtl_obat = '$id'");
   		return $q->row();
	}

	function find_nama_obat($id){
		$q = $this->db->query("Select nama_obat from obat where id_obat = '$id'");
   		return $q->row();
	}

	function rubah_dtl_usulan_obat($id){
		
		$new_insert_data = array(
			'jmlh_yg_diusulkan' => $this->input->post('jmlh_yg_diusulkan'),
			'satuan' => $this->input->post('satuan'),
			'hrg_satuan' => $this->input->post('hrg_satuan'),
			'jmlh_harga' => $this->input->post('jmlh_harga'),
			'merk' => $this->input->post('merk'),
			'jmlh_pnggnaan_thn_sblm' => $this->input->post('jmlh_pnggnaan_thn_sblm'),
		);

		$b = $this->input->post('jmlh_yg_diusulkan');
		$c = $this->input->post('satuan');
		$d = $this->input->post('hrg_satuan');
		$e = $this->input->post('jmlh_harga');
		$f = $this->input->post('merk');
		$g = $this->input->post('jmlh_pnggnaan_thn_sblm');

		$result = $this->db->query("Update dtl_usulan_obat SET jmlh_yg_diusulkan = '$b',
			satuan = '$c',
			hrg_satuan = '$d',
			jmlh_harga = '$e',
			merk = '$f',
			jmlh_pnggnaan_thn_sblm = '$g'
			WHERE id_dtl_obat = '$id'");

		return $result;
	}

	function hapus_usulan_obat($id){
		$this->db->query("delete from dtl_usulan_obat where id_dtl_obat = '$id' ");
	}


	//SDM
	function find_all_sdm(){
		$q = $this->db->query("Select id_jenis_sdm, nama_sdm from jenis_sdm where active_status_sdm = '1'");
   		return $q->result();
	}

	function all_usulan_sdm($unit, $t){
		$q = $this->db->query("Select * from dtl_usulan_sdm where id_usulan = (Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1')");
   		return $q->result();
	}

	function find_id_sdm($nama){
		$find = $this->db->query("Select id_jenis_sdm from jenis_sdm where nama_sdm = '$nama' AND active_status_sdm = '1'");
		return $find->row();
	}

	function add_usulan_sdm($id_usulan,$id_sdm){
	
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_jenis_sdm' => $id_sdm,
			'pendidikan_dan_keahlian' => $this->input->post('pendidikan_dan_keahlian'),
			'jmlh_ada' => $this->input->post('jmlh_ada'),
			'jmlh_mnrt_stndr' => $this->input->post('jmlh_mnrt_stndr'),
			'jmlh_usulan' => $this->input->post('jmlh_usulan'),
			'justifikasi' => $this->input->post('justifikasi'),
			
		);

		$insert = $this->db->insert('dtl_usulan_sdm', $new_insert_data);
		return $insert;
	}

	function find_detail_usulan_sdm($id){
		$q = $this->db->query("Select * from dtl_usulan_sdm where id_dtl_usulan_sdm = '$id'");
   		return $q->row();
	}

	function find_nama_sdm($id){
		$q = $this->db->query("Select nama_sdm from jenis_sdm where id_jenis_sdm = '$id'");
   		return $q->row();
	}

	function hapus_usulan_sdm($id){
		$this->db->query("delete from dtl_usulan_sdm where id_dtl = '$id' ");
	}
}