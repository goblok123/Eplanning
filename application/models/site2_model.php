<?php
class Site2_model extends CI_Model{
	function cari_nama_unit($id){
		$query = $this->db->query("SELECT name_unit from unit where id_unit = $id");
   		return $query->row();
	}

	function cari_usulan_diklat($id){
		$query = $this->db->query("SELECT * from dtl_usulan_diklat where id_usulan = $id");
   		return $query->result();
	}

	function cari_usulan_obat($id){
		$query = $this->db->query("SELECT * from dtl_usulan_obat, obat where id_usulan = $id and dtl_usulan_obat.id_obat = obat.id_obat");
   		return $query->result();
	}

	function cari_usulan_sdm($id){
		$query = $this->db->query("SELECT * from dtl_usulan_sdm, jenis_sdm where id_usulan = $id and dtl_usulan_sdm.id_jenis_sdm = jenis_sdm.id_jenis_sdm");
   		return $query->result();
	}

	function cari_usulan_alat($id){
		$query = $this->db->query("SELECT * from dtl_usulan_alat, alat_kes_dan_non where id_usulan = $id and dtl_usulan_alat.id_alat = alat_kes_dan_non.id_alat");
   		return $query->result();
	}

	function cari_usulan_pemeliharaan_alat($id){
		$query = $this->db->query("SELECT * from dtl_usulan_pmlhrn_alat, alat_kes_dan_non where id_usulan = $id and dtl_usulan_pmlhrn_alat.id_alat = alat_kes_dan_non.id_alat");
   		return $query->result();
	}

	function cari_usulan_gedung($id){
		$query = $this->db->query("SELECT * from dtl_usulan_gedung, gedung where id_usulan = $id and dtl_usulan_gedung.id_gedung = gedung.id_gedung");
   		return $query->result();
	}

	function cari_usulan_pemeliharaan_gedung($id){
		$query = $this->db->query("SELECT * from dtl_usulan_pmlhrn_gedung, gedung where id_usulan = $id and dtl_usulan_pmlhrn_gedung.id_gedung = gedung.id_gedung");
   		return $query->result();
	}

	function cari_usulan_gaji_non($id){
		$query = $this->db->query("SELECT * from dtl_usulan_gaji_non_pns, item_keuangan where id_usulan = $id and dtl_usulan_gaji_non_pns.id_item = item_keuangan.id_item");
   		return $query->result();
	}

	function cari_usulan_gaji_pns($id){
		$query = $this->db->query("SELECT * from dtl_usulan_gaji_pns, item_keuangan where id_usulan = $id and dtl_usulan_gaji_pns.id_item = item_keuangan.id_item");
   		return $query->result();
	}

	function cari_usulan_perencanaan_pendapatan($id){
		$query = $this->db->query("SELECT * from dtl_usulan_prncnn_pndptn, item_keuangan where id_usulan = $id and dtl_usulan_prncnn_pndptn.id_item = item_keuangan.id_item");
   		return $query->result();
	}

	function cari_usulan_berdasarkan_unit($id_unit2){
		$query = $this->db->query("SELECT * from usulan, users where usulan.id_unit = $id_unit2 AND usulan.id_terakhir_penyimpan = users.id_user");
   		return $query->result();
	}

	function status_diketahui($is_usulan2){
		$query = $this->db->query("SELECT id_usulan from usulan where tgl_diketahui = '1970-01-01' && id_usulan = '$is_usulan2'");
   		return $query->num_rows();
	}

	function ketahui_usulan($id_usulan2){
		$this->db->set('tgl_diketahui', 'NOW()', FALSE);

		$this->db->where('id_usulan',$id_usulan2);

		$insert = $this->db->update('usulan');
		return $insert;
	}

	function batalkan_ketahui_usulan($id_usulan2){
		$this->db->set('tgl_diketahui', date('Y-m-d',1970-01-01)) ;
		
		$this->db->where('id_usulan',$id_usulan2);

		$insert = $this->db->update('usulan');
		return $insert;
	}

}
?>