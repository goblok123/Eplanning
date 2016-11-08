<?php

class Site extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->check_log_in();
	}

	function check_log_in(){
		$is_logged_in2 = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in2) || $is_logged_in2 != TRUE){
			$data['account_created'] = 'Maaf Anda tidak dapat mengakses halaman ini.<br/><br/> Silakan login terlebih dahulu';

			$this->load->view('includes/header');
			$this->load->view('menu/menu_not_login');
			$this->load->view('login_form',$data);
			$this->load->view('template/footer');

			$this->CI =& get_instance(); 
			$this->CI->output->_display();

			die();
		}
	}

	function members_area(){

		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			$this->load->view('Pengimput');
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
			$this->load->view('Penanggung_Jawab');
		}else if($hak == 'Administrator'){
			// echo  $this->session->userdata('hakAkses');
			// echo  $this->session->userdata('username');
			// echo  $this->session->userdata('id_user');
			// echo  $this->session->userdata('nama_unit');
			// echo  $this->session->userdata('id_unit');

			$this->load->view('menu/menu_administrator');
			$this->load->view('Administrator');
		}else{
			redirect('login/index');
		}

		$this->load->view('template/footer');

	}

	function item_usulan(){
		$hak = $this->session->userdata('hakAkses');
		$this->load->model('master_model');
		$data['allObat'] = $this->master_model->find_all_obat();
		$data['allJsdm'] = $this->master_model->find_all_j_sdm();
		$data['allBhp'] = $this->master_model->find_all_bhp();
		$data['allAlat'] = $this->master_model->find_all_alat();
		$data['allGedung'] = $this->master_model->find_all_gedung();
		$data['allItemKeu'] = $this->master_model->find_all_item_keu();

		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			$this->load->view('item_usulan/lihat_item',$data);
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
			$this->load->view('item_usulan/lihat_item',$data);
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
			$this->load->view('item_usulan/lihat_item_admin',$data);
		}else{
			$this->load->view('menu/menu_not_login');
			$this->load->view('item_usulan/lihat_item',$data);
		}

		$this->load->view('template/footer');
	}



	function addUnit(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name_unit', 'Nama Unit', 'trim|required|max_length[50]|callback_check_if_unit_exists');
		
		//$this->load->model('master_model');

		if($this->form_validation->run() == FALSE){
			//$data['unit_created'] = 'Gagal menyimpan data.';
			$this->load->view('includes/header');
			$this->load->view('add_unit_form');
			$this->load->view('template/footer');
		}
		else{
			$this->load->model('master_model');

			if($query = $this->master_model->addUnit()){
				$data['unit_created'] = 'Unit sudah tersimpan.';

				$this->load->view('includes/header');
				$this->load->view('add_unit_form', $data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('includes/header');
				$this->load->view('add_unit_form', $data);
				$this->load->view('template/footer');
			}

		}
	}

	function check_if_unit_exists($requested_unit){
		$this->load->model('master_model');

		$unit_available = $this->master_model->check_if_unit_exists($requested_unit);

		if($unit_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

//OBAT
	function tambah_obat_form_kosong(){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_obat');
		$this->load->view('template/footer');
	}

	function tambah_obat_form($m){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_obat',$m);
		$this->load->view('template/footer');
	}

	function add_item_obat(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required|max_length[200]|callback_check_if_obat_exists');

		if($this->form_validation->run() == FALSE){
			$data['obat_added'] = 'Obat gagal tersimpan.';
			$this->tambah_obat_form($data);
		}else{
			$this->load->model('master_model');
			$data['obat_added'] = 'Obat sudah tersimpan.';
			if($query = $this->master_model->addObat()){
				$this->tambah_obat_form($data);
			}
		}
	}

	function check_if_obat_exists($requested_obat){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_obat_exists($requested_obat);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

//SDM
	function tambah_jenis_sdm_form_kosong(){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_jenis_sdm');
		$this->load->view('template/footer');
	}

	function tambah_jenis_sdm_form($m){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_jenis_sdm',$m);
		$this->load->view('template/footer');
	}

	function add_item_jenis_sdm(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('jenis_sdm', 'Jenis SDM', 'trim|required|max_length[200]|callback_check_if_sdm_exists');

		if($this->form_validation->run() == FALSE){
			$data['sdm_added'] = 'Jenis SDM gagal tersimpan.';
			$this->tambah_jenis_sdm_form($data);
		}else{
			$this->load->model('master_model');
			$data['sdm_added'] = 'Jenis SDM sudah tersimpan.';
			if($query = $this->master_model->add_jenis_sdm()){
				$this->tambah_jenis_sdm_form($data);
			}
		}
	}

	function check_if_sdm_exists($requested_sdm){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_sdm_exists($requested_sdm);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

//BPH
	function tambah_bhp_form_kosong(){
		$this->load->model('master_model');
		$data['all_jenis_bhp'] = $this->master_model->find_all_jenis_bhp();

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_bhp',$data);
		$this->load->view('template/footer');
	}

	function tambah_bhp_form($m){
		$this->load->model('master_model');
		$data['all_jenis_bhp'] = $this->master_model->find_all_jenis_bhp();
		$data['added'] = $m;

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_bhp',$data);
		$this->load->view('template/footer');
	}

	function add_bhp(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_bhp', 'Nama BHP', 'trim|required|max_length[200]|callback_check_if_bhp_exists');

		if($this->form_validation->run() == FALSE){
			$da = 'BHP gagal tersimpan.';
			$this->tambah_bhp_form($da);
		}else{
			$this->load->model('master_model');
			$da = 'BHP sudah tersimpan.';
			if($query = $this->master_model->add_bhp()){
				$this->tambah_bhp_form($da);
			}
		}
	}

	function check_if_bhp_exists($requested){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_bhp_exists($requested);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

//Alat kes dan non
	function tambah_alat_form_kosong(){
		$this->load->model('master_model');
		$data['all_alat'] = $this->master_model->find_all_alat();

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_alat',$data);
		$this->load->view('template/footer');
	}

	function tambah_alat_form($m){
		$this->load->model('master_model');
		$data['all_alat'] = $this->master_model->find_all_alat();
		$data['added'] = $m;

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_alat',$data);
		$this->load->view('template/footer');
	}

	function add_alat(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'trim|required|max_length[200]|callback_check_if_alat_exists');

		if($this->form_validation->run() == FALSE){
			$da = 'Alat gagal tersimpan.';
			$this->tambah_alat_form($da);
		}else{
			$this->load->model('master_model');
			$da = 'Alat sudah tersimpan.';
			if($query = $this->master_model->add_alat()){
				$this->tambah_alat_form($da);
			}
		}
	}

	function check_if_alat_exists($requested){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_alat_exists($requested);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

//Gedung
	function tambah_gedung_form_kosong(){
		$this->load->model('master_model');
		$data['all_gedung'] = $this->master_model->find_all_gedung();

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_gedung',$data);
		$this->load->view('template/footer');
	}

	function tambah_gedung_form($m){
		$this->load->model('master_model');
		$data['all_gedung'] = $this->master_model->find_all_gedung();
		$data['added'] = $m;

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_gedung',$data);
		$this->load->view('template/footer');
	}

	function add_gedung(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'trim|required|max_length[200]|callback_check_if_gedung_exists');

		if($this->form_validation->run() == FALSE){
			$da = 'Gedung gagal tersimpan.';
			$this->tambah_gedung_form($da);
		}else{
			$this->load->model('master_model');
			$da = 'Gedung sudah tersimpan.';
			if($query = $this->master_model->add_gedung()){
				$this->tambah_gedung_form($da);
			}
		}
	}

	function check_if_gedung_exists($requested){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_gedung_exists($requested);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//Keuangan
	function tambah_item_keu_form_kosong(){
		$this->load->model('master_model');
		$data['all_item_keu'] = $this->master_model->find_all_item_keu();

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_item_keu',$data);
		$this->load->view('template/footer');
	}

	function tambah_item_keu_form($m){
		$this->load->model('master_model');
		$data['all_item_keu'] = $this->master_model->find_all_item_keu();
		$data['added'] = $m;

		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_item_keu',$data);
		$this->load->view('template/footer');
	}

	function add_item_keu(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_item_keu', 'Nama Item Keuangan', 'trim|required|max_length[200]|callback_check_if_item_keu_exists');

		if($this->form_validation->run() == FALSE){
			$da = 'Item keuangan gagal tersimpan.';
			$this->tambah_item_keu_form($da);
		}else{
			$this->load->model('master_model');
			$da = 'Item keuangan sudah tersimpan.';
			if($query = $this->master_model->add_item_keu()){
				$this->tambah_item_keu_form($da);
			}
		}
	}

	function check_if_item_keu_exists($requested){
		$this->load->model('master_model');

		$available = $this->master_model->check_if_item_keu_exists($requested);

		if($available){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function usulan(){
		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			$this->load->view('usulan/usulan');
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
			$this->load->view('usulan/usulan');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
			$this->load->view('usulan/usulan');
		}else{
			$this->load->view('menu/menu_not_login');
			$this->load->view('item_usulan/lihat_item');
		}

		$this->load->view('template/footer');

	}

	function usulan_pendapatan(){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('usulan/usulan_pendapatan');
		$this->load->view('template/footer');

	}


	//Usulan diklat
	// function tambah_usulan_diklat_form_kosong(){

	// 	$unit = $this->session->userdata('id_unit');
	// 	$hak = $this->session->userdata('hakAkses');
	// 	$this->load->view('template/header');

	// 	$this->load->model('tambah_usulan_model');
	// 	$data['all_usulan_diklat'] = $this->tambah_usulan_model->find_usulan_diklat($unit,"Diklat");

	// 	if($hak == 'Pengimput'){
	// 		$this->load->view('menu/menu_pengimput');
			
	// 	}else if($hak == 'Penangung Jawab'){
	// 		$this->load->view('menu/menu_penanggung_jawab');
	// 	}else if($hak == 'Administrator'){
	// 		$this->load->view('menu/menu_administrator');
	// 	}else{
	// 		$this->load->view('menu/menu_not_login');
	// 	}

	// 	$this->load->view('usulan/usulan_diklat',$data);


	// 	$this->load->view('template/footer');
	// }

	function tambah_usulan_diklat_form($a){

		$unit = $this->session->userdata('id_unit');
		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		$this->load->model('tambah_usulan_model');
		$data['all'] = $this->tambah_usulan_model->find_usulan_diklat($unit,"Diklat");
		$data['added'] = $a;

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/usulan_diklat',$data);


		$this->load->view('template/footer');


	}

	// function cek_ada_usulan_diklat_aktif(){
	// 	$unit = $this->session->userdata('id_unit');
	// 	$this->load->model('tambah_usulan_model');
	// 	$query = $this->tambah_usulan_model->find_usulan_diklat($unit);

	// 	if ($query != NULL) {
	// 		echo $query;
	// 	}else{
	// 		echo "nol";
	// 	}
		
	// }

	function add_usulan_diklat(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_diklat', 'Nama Diklat', 'trim|required|max_length[500]');
		$this->form_validation->set_rules('jmlh_sdm_pernah', 'Jumlah SDM Yang Pernah Ikut', 'trim|required');
		$this->form_validation->set_rules('jmlh_sdm_belum', 'Jumlah SDM Yang Belum Pernah Ikut', 'trim|required');
		$this->form_validation->set_rules('jmlh_sdm_usul', 'Jumlah SDM Yang Diusulkan Ikut', 'trim|required');
		$this->form_validation->set_rules('justifikasi', 'Justifikasi', 'trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim');


		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->tambah_usulan_diklat_form($da);
		}else{
			$this->load->model('tambah_usulan_model');
			$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), "Diklat");

			// echo $r->id_usulan;

			if($r != null){
				if($this->tambah_usulan_model->add_usulan_diklat($r->id_usulan)){
					$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
					$this->tambah_usulan_diklat_form("Usulan BERHASIL disimpan");

				}else{
					$this->tambah_usulan_diklat_form("Usulan GAGAL disimpan");
				}
			}else{
				$dataUsulan =  array(
					'id_pemasuk' => $this->session->userdata('id_user'),
					'id_unit' => $this->session->userdata('id_unit'),
					'type_usulan' => 'Diklat'
				);

				$this->tambah_usulan_model->make_id_usulan($dataUsulan);

				$t = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), "Diklat");

				if($this->tambah_usulan_model->add_usulan_diklat($t->id_usulan)){
					$this->tambah_usulan_diklat_form("Usulan BERHASIL disimpan");
				}else{
					$this->tambah_usulan_diklat_form("Usulan GAGAL disimpan");
				}

			}

			
		}
	}

	function rubah_usulan_diklat_form($id){
		$this->load->model('tambah_usulan_model');
		$dtl = $this->tambah_usulan_model->find_detail_usulan($id);

		$data["id"] = $id;
		$data["nama_diklat"] = $dtl->nama_diklat;
		$data["jmlh_sdm_pernah"] = $dtl->jmlh_sdm_pernah;
		$data["jmlh_sdm_belum"] = $dtl->jmlh_sdm_belum;
		$data["jmlh_sdm_usul"] = $dtl->jmlh_sdm_usul;
		$data["justifikasi"] = $dtl->justifikasi;
		$data["catatan"] = $dtl->catatan;

		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/rubah_usulan_diklat_form',$data);


		$this->load->view('template/footer');

		// $dataUsulan =  array(
		// 				'id_pemasuk' => $dtl->,
		// 				'id_unit' => $this->session->userdata('id_unit'),
		// 				'type_usulan' => 'Diklat'
		// 			);


	}

	function rubah_usulan_diklat($id){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_diklat', 'Nama Diklat', 'trim|required|max_length[500]');
		$this->form_validation->set_rules('jmlh_sdm_pernah', 'Jumlah SDM Yang Pernah Ikut', 'trim|required');
		$this->form_validation->set_rules('jmlh_sdm_belum', 'Jumlah SDM Yang Belum Pernah Ikut', 'trim|required');
		$this->form_validation->set_rules('jmlh_sdm_usul', 'Jumlah SDM Yang Diusulkan Ikut', 'trim|required');
		$this->form_validation->set_rules('justifikasi', 'Justifikasi', 'trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim');

		$this->load->model('tambah_usulan_model');

		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->rubah_usulan_diklat_form($id);
		}else{
			$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), "Diklat");
			$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
			$this->tambah_usulan_model->rubah_usulan_all($id);
			redirect('site/tambah_usulan_diklat_form/Usulan_Berhasil_Dirubah');
			//$this->tambah_usulan_diklat_form("-");
		}
	}

	function hapus_usulan_diklat($id){
		$this->load->model('tambah_usulan_model');
		$this->tambah_usulan_model->hapus_usulan_diklat($id);

		redirect('site/tambah_usulan_diklat_form/Usulan_Berhasil_Dihapus');
	}

	//Usulan obat
	function tambah_usulan_obat_form($a){
		$unit = $this->session->userdata('id_unit');
		$hak = $this->session->userdata('hakAkses');
		$this->load->model('tambah_usulan_model');
		$data["obat"] = $this->tambah_usulan_model->find_all_obat();
		$data["added"] = $a;
		$data["usulan_obat"] = $this->tambah_usulan_model->all_usulan_obat($unit, "Obat");

		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/usulan_obat_form',$data);

		$this->load->view('template/footer');

	}

	function add_usulan_obat(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required|max_length[500]'); //check_if_item_exists belum bikin call back function di model obat
		$this->form_validation->set_rules('jmlh_yg_diusulkan', 'Jumlah yang Diusulkan', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('hrg_satuan', 'Harga Satuan', 'trim|required');
		$this->form_validation->set_rules('jmlh_harga', 'Jumlah Harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk/Type/Model/Ukuran yang Diinginkan', 'trim|required');
		$this->form_validation->set_rules('jmlh_pnggnaan_thn_sblm', 'Jumlah Penggunaan Tahun Sebelumnya', 'trim|required');

		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->usulan_obat_form($da);
		}else{
			$this->load->model('tambah_usulan_model');
			$s = $this->tambah_usulan_model->find_id_obat($this->input->post('nama_obat'));

			if($this->tambah_usulan_model->check_obat($s->id_obat)){
				$tp = "Obat";
				
				$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), $tp);

				if($r != null){
					if($this->tambah_usulan_model->add_usulan_obat($r->id_usulan, $s->id_obat)){
						$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
						$this->tambah_usulan_obat_form("Usulan BERHASIL disimpan");
					}else{
						$this->tambah_usulan_obat_form("Usulan GAGAL disimpan");
					}
				}else{
					$dataUsulan =  array(
						'id_pemasuk' => $this->session->userdata('id_user'),
						'id_unit' => $this->session->userdata('id_unit'),
						'type_usulan' => $tp
					);

					$this->tambah_usulan_model->make_id_usulan($dataUsulan);
					$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), $tp);

					if($this->tambah_usulan_model->add_usulan_obat($r->id_usulan, $s->id_obat)){
						$this->tambah_usulan_obat_form("Usulan BERHASIL disimpan");
					}else{
						$this->tambah_usulan_obat_form("Usulan GAGAL disimpan");
					}

				}
			}else{
				$this->tambah_usulan_obat_form("Item Obat Sudah Pernah Disimpan. \n Silakan Gunakan Perubahan");
			}
		}

	}

	function rubah_usulan_obat_form($id){
		$this->load->model('tambah_usulan_model');
		$dtl = $this->tambah_usulan_model->find_detail_usulan_obat($id);
		$nm_obat = $this->tambah_usulan_model->find_nama_obat($dtl->id_obat);

		$data["id"] = $id;
		$data["jmlh_yg_diusulkan"] = $dtl->jmlh_yg_diusulkan;
		$data["nama_obat"] = $nm_obat->nama_obat;
		$data["hrg_satuan"] = $dtl->hrg_satuan;
		$data["jmlh_harga"] = $dtl->jmlh_harga;
		$data["merk"] = $dtl->merk;
		$data["jmlh_pnggnaan_thn_sblm"] = $dtl->jmlh_pnggnaan_thn_sblm;
		$data["satuan"] = $dtl->satuan;

		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/rubah_usulan_obat_form',$data);


		$this->load->view('template/footer');
	}

	function rubah_usulan_obat($id){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('jmlh_yg_diusulkan', 'Jumlah yang Diusulkan', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('hrg_satuan', 'Harga Satuan', 'trim|required');
		$this->form_validation->set_rules('jmlh_harga', 'Jumlah Harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk/Type/Model/Ukuran yang Diinginkan', 'trim|required');
		$this->form_validation->set_rules('jmlh_pnggnaan_thn_sblm', 'Jumlah Penggunaan Tahun Sebelumnya', 'trim|required');

		$this->load->model('tambah_usulan_model');

		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->rubah_usulan_obat_form($id);
		}else{
			$this->tambah_usulan_model->rubah_dtl_usulan_obat($id);
			$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), "Diklat");
			$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
			redirect('site/tambah_usulan_obat_form/Usulan_Berhasil_Dirubah');
			//$this->tambah_usulan_diklat_form("-");
		}
	}

	function hapus_usulan_obat($id){
		$this->load->model('tambah_usulan_model');
		$this->tambah_usulan_model->hapus_usulan_obat($id);

		redirect('site/tambah_usulan_obat_form/Usulan_Berhasil_Dihapus');
	}

	//USULAN SDM
	function tambah_usulan_sdm_form($a){
		$unit = $this->session->userdata('id_unit');
		$hak = $this->session->userdata('hakAkses');
		$this->load->model('tambah_usulan_model');
		$data["sdm"] = $this->tambah_usulan_model->find_all_sdm();
		$data["added"] = $a;
		$data["usulan_sdm"] = $this->tambah_usulan_model->all_usulan_sdm($unit, "SDM");

		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/usulan_sdm_form',$data);

		$this->load->view('template/footer');
	}

	function add_usulan_sdm(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_sdm', 'Nama SDM', 'trim|required'); //check_if_item_exists belum bikin call back function di model obat
		$this->form_validation->set_rules('pendidikan_dan_keahlian', 'Pendidikan dan Keahlian', 'trim|required');
		$this->form_validation->set_rules('jmlh_ada', 'Jumlah yang Sudah Ada', 'trim|required');
		$this->form_validation->set_rules('jmlh_mnrt_stndr', 'Jumlah yg Harus Ada Menurut Standar', 'trim|required');
		$this->form_validation->set_rules('jmlh_usulan', 'Jumlah Kebutuhan SDM yang Diusulkan', 'trim|required');
		$this->form_validation->set_rules('justifikasi', 'justifikasi', 'trim');

		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->tambah_usulan_sdm_form($da);
		}else{
			$this->load->model('tambah_usulan_model');
			$s = $this->tambah_usulan_model->find_id_sdm($this->input->post('nama_sdm'));

				$tp = "SDM";
				
				$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), $tp);

				if($r != null){
					if($this->tambah_usulan_model->add_usulan_sdm($r->id_usulan, $s->id_jenis_sdm)){
						$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
						$this->tambah_usulan_sdm_form("Usulan BERHASIL disimpan");
					}else{
						$this->tambah_usulan_sdm_form("Usulan GAGAL disimpan");
					}
				}else{
					$dataUsulan =  array(
						'id_pemasuk' => $this->session->userdata('id_user'),
						'id_unit' => $this->session->userdata('id_unit'),
						'type_usulan' => $tp
					);

					$this->tambah_usulan_model->make_id_usulan($dataUsulan);
					$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), $tp);

					if($this->tambah_usulan_model->add_usulan_sdm($r->id_usulan, $s->id_jenis_sdm)){
						$this->tambah_usulan_sdm_form("Usulan BERHASIL disimpan");
					}else{
						$this->tambah_usulan_sdm_form("Usulan GAGAL disimpan");
					}

				}
			
		}

	}

	function rubah_usulan_sdm_form($id){
		$this->load->model('tambah_usulan_model');
		$dtl = $this->tambah_usulan_model->find_detail_usulan_sdm($id);
		$nm_sdm = $this->tambah_usulan_model->find_nama_sdm($dtl->id_jenis_sdm);

		$data["id"] = $id;
		$data["nama_sdm"] = $nm_sdm->nama_sdm;
		$data["pendidikan_dan_keahlian"] = $dtl->pendidikan_dan_keahlian;
		$data["jmlh_ada"] = $dtl->jmlh_ada;
		$data["jmlh_mnrt_stndr"] = $dtl->jmlh_mnrt_stndr;
		$data["jmlh_usulan"] = $dtl->jmlh_usulan;
		$data["justifikasi"] = $dtl->justifikasi;

		$hak = $this->session->userdata('hakAkses');
		$this->load->view('template/header');

		if($hak == 'Pengimput'){
			$this->load->view('menu/menu_pengimput');
			
		}else if($hak == 'Penangung Jawab'){
			$this->load->view('menu/menu_penanggung_jawab');
		}else if($hak == 'Administrator'){
			$this->load->view('menu/menu_administrator');
		}else{
			$this->load->view('menu/menu_not_login');
		}

		$this->load->view('usulan/rubah_usulan_sdm_form',$data);


		$this->load->view('template/footer');
	}

	function rubah_usulan_sdm($id){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('jmlh_yg_diusulkan', 'Jumlah yang Diusulkan', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('hrg_satuan', 'Harga Satuan', 'trim|required');
		$this->form_validation->set_rules('jmlh_harga', 'Jumlah Harga', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk/Type/Model/Ukuran yang Diinginkan', 'trim|required');
		$this->form_validation->set_rules('jmlh_pnggnaan_thn_sblm', 'Jumlah Penggunaan Tahun Sebelumnya', 'trim|required');

		$this->load->model('tambah_usulan_model');

		if($this->form_validation->run() == FALSE){
			$da = 'Usulan gagal tersimpan.';
			$this->rubah_usulan_obat_form($id);
		}else{
			$this->tambah_usulan_model->rubah_dtl_usulan_obat($id);
			$r = $this->tambah_usulan_model->find_id_usulan($this->session->userdata('id_unit'), "Diklat");
			$this->tambah_usulan_model->update_usulan($this->session->userdata('id_user'), $r->id_usulan);
			redirect('site/tambah_usulan_obat_form/Usulan_Berhasil_Dirubah');
			//$this->tambah_usulan_diklat_form("-");
		}
	}

	function hapus_usulan_sdm($id){
		$this->load->model('tambah_usulan_model');
		$this->tambah_usulan_model->hapus_usulan_obat($id);

		redirect('site/tambah_usulan_sdm_form/Usulan_Berhasil_Dihapus');
	}

}
?>