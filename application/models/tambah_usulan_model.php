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

	function ubah_usulan_all($id){
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

	function ubah_dtl_usulan_obat($id){
		
		// $new_insert_data = array(
		// 	'jmlh_yg_diusulkan' => $this->input->post('jmlh_yg_diusulkan'),
		// 	'satuan' => $this->input->post('satuan'),
		// 	'hrg_satuan' => $this->input->post('hrg_satuan'),
		// 	'jmlh_harga' => $this->input->post('jmlh_harga'),
		// 	'merk' => $this->input->post('merk'),
		// 	'jmlh_pnggnaan_thn_sblm' => $this->input->post('jmlh_pnggnaan_thn_sblm'),
		// );

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
		$this->db->query("delete from dtl_usulan_sdm where id_dtl_usulan_sdm = '$id' ");
	}

	//Ubah usulan SDM belum buat

	function ubah_dtl_usulan_sdm($id){

		$b = $this->input->post('pendidikan_dan_keahlian');
		$c = $this->input->post('jmlh_ada');
		$d = $this->input->post('jmlh_mnrt_stndr');
		$e = $this->input->post('jmlh_usulan');
		$f = $this->input->post('justifikasi');

		$result = $this->db->query("Update dtl_usulan_sdm SET pendidikan_dan_keahlian = '$b',
			jmlh_ada = '$c',
			jmlh_mnrt_stndr = '$d',
			jmlh_usulan = '$e',
			justifikasi = '$f'
			WHERE id_dtl_usulan_sdm = '$id'");

		return $result;
	}

	//BHP
	function cari_data_jenis_bhp($no){
		$q = $this->db->query("Select id_bhp, nama_bhp from bhp where id_kode = '$no'");
   		return $q->result();
	}

	function find_id_bhp($nama){
		$find = $this->db->query("Select id_bhp from bhp where nama_bhp = '$nama'");
		return $find->row();
	}

	function find_nama_bhp($id_bhp){
		$q = $this->db->query("Select nama_bhp from bhp where id_bhp = '$id_bhp'");
   		return $q->row();
	}

	function find_kode_jenis_bhp($id_bhp){
		$q = $this->db->query("Select id_kode from bhp where id_bhp = '$id_bhp'");
   		return $q->row();
	}

	function check_bhp($id){
		$q = $this->db->query("Select id_bhp from dtl_usulan_bhp where id_bhp = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function tambah_usulan_bhp($id_usulan,$id_bhp){

		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_bhp' => $id_bhp,
			'jmlh_yg_diusulkan' => $this->input->post('jmlh_yg_diusulkan'),
			'satuan' => $this->input->post('satuan'),
			'hrg_satuan' => $this->input->post('hrg_satuan'),
			'jmlh_harga' => $this->input->post('jmlh_harga'),
			'merk' => $this->input->post('merk'),
			'jmlh_pnggnaan_thn_sblm' => $this->input->post('jmlh_pnggnaan_thn_sblm'),
		);

		$insert = $this->db->insert('dtl_usulan_bhp', $new_insert_data);
		return $insert;
	}

	function usulan_bhp_satu_jenis($kode, $id){

		$find = $this->db->query("Select * from dtl_usulan_bhp,(Select id_bhp from bhp where id_kode = '$kode') as nt  where dtl_usulan_bhp.id_usulan = '$id' AND nt.id_bhp = dtl_usulan_bhp.id_bhp");
		return $find->result();
	}

	function find_detail_usulan_bhp($id){
		$q = $this->db->query("Select * from dtl_usulan_bhp where id_dtl_bhp = '$id'");
   		return $q->row();
	}

	function find_nama_jenis_bhp($id){
		$q = $this->db->query("Select (kode_jenis_bhp.nama_jenis_bhp) as jenis_bhp from kode_jenis_bhp, bhp where bhp.id_bhp = '$id' and bhp.id_kode = kode_jenis_bhp.id_kode");
   		return $q->row();
	}

	function ubah_dtl_usulan_bhp($id){

		$b = $this->input->post('jmlh_yg_diusulkan');
		$c = $this->input->post('satuan');
		$d = $this->input->post('hrg_satuan');
		$e = $this->input->post('jmlh_harga');
		$f = $this->input->post('merk');
		$g = $this->input->post('jmlh_pnggnaan_thn_sblm');

		$result = $this->db->query("Update dtl_usulan_bhp SET jmlh_yg_diusulkan = '$b',
			satuan = '$c',
			hrg_satuan = '$d',
			jmlh_harga = '$e',
			merk = '$f',
			jmlh_pnggnaan_thn_sblm = '$f'
			WHERE id_dtl_bhp = '$id'");

		return $result;
	}

	function hapus_usulan_bhp($id){
		$this->db->query("delete from dtl_usulan_bhp where id_dtl_bhp = '$id' ");
	}

	//Alat
	function cari_jenis_alat($type){
		$q = $this->db->query("Select id_alat, nama_alat_kes_dan_non from alat_kes_dan_non where jenis_alat = '$type'");
   		return $q->result();
	}

	function usulan_alat_satu_jenis($jenis, $id){
		$find = $this->db->query("Select * from dtl_usulan_alat,(Select id_alat from alat_kes_dan_non where jenis_alat = '$jenis') as alat where dtl_usulan_alat.id_usulan = '$id' AND alat.id_alat = dtl_usulan_alat.id_alat");
		return $find->result();
	}

	function find_id_alat($nama){
		$find = $this->db->query("Select id_alat from alat_kes_dan_non where nama_alat_kes_dan_non = '$nama'");
		return $find->row();
	}

	function check_alat($id){
		$q = $this->db->query("Select id_alat from dtl_usulan_alat where id_alat = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function tambah_usulan_alat($id_usulan, $id_alat){
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_alat' => $id_alat,
			'jmlh_yg_sdh_ada' => $this->input->post('jmlh_yg_sdh_ada'),
			'jmlh_yg_diusulkan' => $this->input->post('jmlh_yg_diusulkan'),
			'kondisi' => $this->input->post('kondisi'),
			'justifikasi' => $this->input->post('justifikasi'),
			'merk' => $this->input->post('merk'),
		);

		$insert = $this->db->insert('dtl_usulan_alat', $new_insert_data);
		return $insert;
	}

	function find_detail_usulan_alat($id){
		$q = $this->db->query("Select * from dtl_usulan_alat where id_dtl_usulan_alat = '$id'");
   		return $q->row();
	}

	function find_nama_alat($id_alat){
		$q = $this->db->query("Select nama_alat_kes_dan_non, jenis_alat from alat_kes_dan_non where id_alat = '$id_alat'");
   		return $q->row();
	}

	function ubah_dtl_usulan_alat($id){
		$b = $this->input->post('jmlh_yg_sdh_ada');
		$c = $this->input->post('jmlh_yg_diusulkan');
		$d = $this->input->post('kondisi');
		$e = $this->input->post('justifikasi');
		$f = $this->input->post('merk');

		$result = $this->db->query("Update dtl_usulan_alat SET 
			jmlh_yg_sdh_ada = '$b',
			jmlh_yg_diusulkan = '$c',
			kondisi = '$d',
			justifikasi = '$e',
			merk = '$f'
			WHERE id_dtl_usulan_alat = '$id'");

		return $result;
	}

	function hapus_usulan_alat($id){
		$this->db->query("delete from dtl_usulan_alat where id_dtl_usulan_alat = '$id' ");
	}

	//Pemeliharaan Alat
	function usulan_pemeliharaan_alat_satu_jenis($jenis, $id){
		$find = $this->db->query("Select * from dtl_usulan_pmlhrn_alat,(Select id_alat from alat_kes_dan_non where jenis_alat = '$jenis') as alat where dtl_usulan_pmlhrn_alat.id_usulan = '$id' AND alat.id_alat = dtl_usulan_pmlhrn_alat.id_alat");
		return $find->result();
	}

	function check_pemeliharaan_alat($id){
		$q = $this->db->query("Select id_alat from dtl_usulan_pmlhrn_alat where id_alat = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function tambah_usulan_pemeliharaan_alat($id_usulan, $id_alat){
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_alat' => $id_alat,
			'merk' => $this->input->post('merk'),
			'pngdn_thn' => $this->input->post('pngdn_thn'),
			'kondisi' => $this->input->post('kondisi'),
			'jmlh_diperbaiki' => $this->input->post('jmlh_diperbaiki'),
			'jns_pmlhrn' => $this->input->post('jns_pmlhrn'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_pmlhrn_alat', $new_insert_data);
		return $insert;
	}

	function find_detail_usulan_pemeliharaan_alat($id){
		$q = $this->db->query("Select * from dtl_usulan_pmlhrn_alat where id_dtl_pmlhrn_alat = '$id'");
   		return $q->row();
	}

	function ubah_dtl_usulan_pemeliharaan_alat($id){
		$b = $this->input->post('merk');
		$c = $this->input->post('pngdn_thn');
		$d = $this->input->post('kondisi');
		$e = $this->input->post('jmlh_diperbaiki');
		$f = $this->input->post('jns_pmlhrn');
		$g = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_pmlhrn_alat SET 
			merk = '$b',
			pngdn_thn = '$c',
			kondisi = '$d',
			jmlh_diperbaiki = '$e',
			jns_pmlhrn = '$f',
			info = '$g'
			WHERE id_dtl_pmlhrn_alat = '$id'");

		return $result;
	}

	function hapus_usulan_pemeliharaan_alat($id){
		$this->db->query("delete from dtl_usulan_pmlhrn_alat where id_dtl_pmlhrn_alat = '$id' ");
	}

	//Gedung
	function cari_semua_gedung(){
		$q = $this->db->query("Select * from gedung");
   		return $q->result();
	}

	function cari_id_gedung($nama){
		$q = $this->db->query("Select id_gedung from gedung where nama_gedung = '$nama'");
   		return $q->row();
	}

	function semua_usulan_gedung($unit, $t){
		$q = $this->db->query("Select * from dtl_usulan_gedung where id_usulan = (Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1')");
   		return $q->result();
	}

	function tambah_usulan_gedung($id_usulan,$id_gdng){
	
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_gedung' => $id_gdng,
			'jmlh_ada' => $this->input->post('jmlh_ada'),
			'kondisi' => $this->input->post('kondisi'),
			'jmlh_diusulkan' => $this->input->post('jmlh_diusulkan'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_gedung', $new_insert_data);
		return $insert;
	}

	function cari_dtl_usulan_gedung($id){
		$q = $this->db->query("Select * from dtl_usulan_gedung where id_dtl_usulan_gedung = '$id'");
   		return $q->row();
	}

	function cari_nama_gedung($id){
		$q = $this->db->query("Select nama_gedung from gedung where id_gedung = '$id'");
   		return $q->row();
	}

	function ubah_dtl_usulan_gedung($id){
		$a = $this->input->post('jmlh_ada');
		$b = $this->input->post('kondisi');
		$c = $this->input->post('jmlh_diusulkan');
		$d = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_gedung SET 
			jmlh_ada = '$a',
			kondisi = '$b',
			jmlh_diusulkan = '$c',
			info = '$d'
			WHERE id_dtl_usulan_gedung = '$id'");

		return $result;
	}

	function hapus_dtl_usulan_gedung($id){
		$this->db->query("delete from dtl_usulan_gedung where id_dtl_usulan_gedung = '$id' ");
	}

	//Pemeliharaan Gedung
	function semua_usulan_pmlhrn_gedung($unit, $t){
		$q = $this->db->query("Select * from dtl_usulan_pmlhrn_gedung where id_usulan = (Select id_usulan from usulan where id_unit = '$unit' AND edit_able ='1' AND type_usulan = '$t' AND active_status = '1')");
   		return $q->result();
	}

	function tambah_usulan_pmlhrn_gedung($id_usulan,$id_gdng){
	
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_gedung' => $id_gdng,
			'bgn_diperbaiki' => $this->input->post('bgn_diperbaiki'),
			'pngdn_thn' => $this->input->post('pngdn_thn'),
			'kondisi' => $this->input->post('kondisi'),
			'jmlh_dprbk' => $this->input->post('jmlh_dprbk'),
			'jns_pmlhrn' => $this->input->post('jns_pmlhrn'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_pmlhrn_gedung', $new_insert_data);
		return $insert;
	}

	function ubah_dtl_usulan_pmlhrn_gedung($id){
		$b = $this->input->post('bgn_diperbaiki');
		$c = $this->input->post('pngdn_thn');
		$d = $this->input->post('kondisi');
		$e = $this->input->post('jmlh_dprbk');
		$f = $this->input->post('jns_pmlhrn');
		$g = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_pmlhrn_gedung SET 
			bgn_diperbaiki = '$b',
			pngdn_thn = '$c',
			kondisi = '$d',
			jmlh_dprbk = '$e',
			jns_pmlhrn = '$f',
			info = '$g'
			WHERE id_dtl_usln_pmlhrn_gedung = '$id'");

		return $result;
	}

	function hapus_usulan_pmlhrn_gedung($id){
		$this->db->query("delete from dtl_usulan_pmlhrn_gedung where id_dtl_usln_pmlhrn_gedung = '$id' ");
	}

	function cari_dtl_usulan_pmlhrn_gedung($id){
		$q = $this->db->query("Select * from dtl_usulan_pmlhrn_gedung where id_dtl_usln_pmlhrn_gedung = '$id'");
   		return $q->row();
	}

	//Usulan gaji non pns
	function cari_data_jenis_item_non_pns(){
		$q = $this->db->query("Select * from item_keuangan where jenis_item_keu = 'Kualifikasi Tenaga Kontrak'");
   		return $q->result();
	}

	function usulan_gaji_non($id){
		$q = $this->db->query("Select * from dtl_usulan_gaji_non_pns where id_usulan = '$id'");
   		return $q->result();
	}


	function find_id_item_keu($nama){
		$q = $this->db->query("Select id_item from item_keuangan where nama_item_keu = '$nama'");
   		return $q->row();
	}

	function check_item_keu($id){
		$q = $this->db->query("Select id_item from dtl_usulan_gaji_non_pns where id_item = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}
	
	function tambah_usulan_gaji_non_pns($id_usulan, $id_item){
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_item' => $id_item,
			'jmlh_pgwi' => $this->input->post('jmlh_pgwi'),
			'jmlh_bln' => $this->input->post('jmlh_bln'),
			'jmlh_gaji_perbulan' => $this->input->post('jmlh_gaji_perbulan'),
			'jmlh_gaji_pertahun_n1' => $this->input->post('jmlh_gaji_pertahun_n1'),
			'jmlh_gaji_pertahun_n' => $this->input->post('jmlh_gaji_pertahun_n'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_gaji_non_pns', $new_insert_data);
		return $insert;
	}

	function cari_dtl_usulan_gaji_non($id){
		$q = $this->db->query("Select * from dtl_usulan_gaji_non_pns where id_dtl_usln_gaji_non_pns = '$id'");
   		return $q->row();
	}

	function cari_nama_item($id){
		$q = $this->db->query("Select nama_item_keu from item_keuangan where id_item = '$id'");
   		return $q->row();
	}

	function ubah_usulan_gaji_non_pns($id){
		$b = $this->input->post('jmlh_pgwi');
		$c = $this->input->post('jmlh_bln');
		$d = $this->input->post('jmlh_gaji_perbulan');
		$e = $this->input->post('jmlh_gaji_pertahun_n1');
		$f = $this->input->post('jmlh_gaji_pertahun_n');
		$g = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_gaji_non_pns SET 
			jmlh_pgwi = '$b',
			jmlh_bln = '$c',
			jmlh_gaji_perbulan = '$d',
			jmlh_gaji_pertahun_n1 = '$e',
			jmlh_gaji_pertahun_n = '$f',
			info = '$g'
			WHERE id_dtl_usln_gaji_non_pns = '$id'");

		return $result;
	}

	function hapus_usulan_gaji_non_pns($id){
		$this->db->query("delete from dtl_usulan_gaji_non_pns where id_dtl_usln_gaji_non_pns = '$id' ");
	}

	//Usulan gaji pns
	function cari_data_jenis_item_pns(){
		$q = $this->db->query("Select * from item_keuangan where jenis_item_keu = 'Uraian Belanja Gaji dan Tunjangan PNS'");
   		return $q->result();
	}

	function usulan_gaji_pns($id){
		$q = $this->db->query("Select * from dtl_usulan_gaji_pns where id_usulan = '$id'");
   		return $q->result();
	}

	function check_item_keu_pns($id){
		$q = $this->db->query("Select id_item from dtl_usulan_gaji_pns where id_item = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function tambah_usulan_gaji_pns($id_usulan, $id_item){
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_item' => $id_item,
			'gaji_tahun_lalu' => $this->input->post('gaji_tahun_lalu'),
			'rencana_gaji' => $this->input->post('rencana_gaji'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_gaji_pns', $new_insert_data);
		return $insert;
	}

	function ubah_usulan_gaji_pns($id){
		$b = $this->input->post('gaji_tahun_lalu');
		$c = $this->input->post('rencana_gaji');
		$g = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_gaji_pns SET 
			gaji_tahun_lalu = '$b',
			rencana_gaji = '$c',
			info = '$g'
			WHERE id_dtl_usln_gaji_pns = '$id'");

		return $result;
	}

	function cari_dtl_usulan_gaji_pns($id){
		$q = $this->db->query("Select * from dtl_usulan_gaji_pns where id_dtl_usln_gaji_pns = '$id'");
   		return $q->row();
	}

	function hapus_usulan_gaji_pns($id){
		$this->db->query("delete from dtl_usulan_gaji_pns where id_dtl_usln_gaji_pns = '$id' ");
	}

	//usulan perencanaan
	function cari_data_jenis_item_komponen(){
		$q = $this->db->query("Select * from item_keuangan where jenis_item_keu = 'Komponen Pendapatan Rumah Sakit'");
   		return $q->result();
	}

	function usulan_perencanaan_pendapatan($id){
		$q = $this->db->query("Select * from dtl_usulan_prncnn_pndptn where id_usulan = '$id'");
   		return $q->result();
	}

	function check_item_komponen($id){
		$q = $this->db->query("Select id_item from dtl_usulan_prncnn_pndptn where id_item = '$id'");
   		if($q->num_rows() >= 1){
			return false;
		}else{
			return true;
		}
	}

	function tambah_usulan_perencanaan_pendapatan($id_usulan, $id_item){
		$new_insert_data = array(
			'id_usulan' => $id_usulan,
			'id_item' => $id_item,
			'realisasi_tahun_lalu' => $this->input->post('realisasi_tahun_lalu'),
			'realisasi_pendapatan' => $this->input->post('realisasi_pendapatan'),
			'rencana_pendapatan' => $this->input->post('rencana_pendapatan'),
			'info' => $this->input->post('info'),
		);

		$insert = $this->db->insert('dtl_usulan_prncnn_pndptn', $new_insert_data);
		return $insert;
	}

	function cari_dtl_usulan_perencanaan_pendapatan($id){
		$q = $this->db->query("Select * from dtl_usulan_prncnn_pndptn where id_dtl_usulan_prncnn_pndptn = '$id'");
   		return $q->row();
	}

	function ubah_usulan_perencanaan_pendapatan($id){
		$b = $this->input->post('realisasi_tahun_lalu');
		$c = $this->input->post('realisasi_pendapatan');
		$d = $this->input->post('rencana_pendapatan');
		$g = $this->input->post('info');

		$result = $this->db->query("Update dtl_usulan_prncnn_pndptn SET 
			realisasi_tahun_lalu = '$b',
			realisasi_pendapatan = '$c',
			rencana_pendapatan = '$d',
			info = '$g'
			WHERE id_dtl_usulan_prncnn_pndptn = '$id'");

		return $result;
	}

	function hapus_usulan_perencanaan_pendapatan($id){
		$this->db->query("delete from dtl_usulan_prncnn_pndptn where id_dtl_usulan_prncnn_pndptn = '$id' ");
	}

}