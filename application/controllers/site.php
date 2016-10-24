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

		$this->form_validation->set_rules('name_obat', 'Nama Obat', 'trim|required|max_length[200]|callback_check_if_obat_exists');

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
		$this->load->view('usulan/usulan_form');
	}
}
?>