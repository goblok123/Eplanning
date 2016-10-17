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

		if($hak == 'pengimput'){
			$this->load->view('menu/menu_pengimput');
			$this->load->view('Pengimput');
		}else if($hak == 'penanggungJawab'){
			$this->load->view('menu/menu_penanggung_jawab');
			$this->load->view('Penanggung_Jawab');
		}else if($hak == 'administrator'){
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

		$this->load->view('template/header');

		if($hak == 'pengimput'){
			$this->load->view('menu/menu_pengimput');
			$this->load->view('item_usulan/lihat_item',$data);
		}else if($hak == 'penanggungJawab'){
			$this->load->view('menu/menu_penanggung_jawab');
			$this->load->view('item_usulan/lihat_item',$data);
		}else if($hak == 'administrator'){
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

	function tambah_obat_form(){
		$this->load->view('template/header');
		$this->load->view('menu/menu_administrator');
		$this->load->view('item_usulan/tambah_obat');
		$this->load->view('template/footer');
	}

	function add_item_obat(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name_obat', 'Nama Obat', 'trim|required|max_length[150]|callback_check_if_obat_exists');

		if($this->form_validation->run() == FALSE){
			$this->tambah_obat_form();
		}else{
			$this->load->model('master_model');
			if($query = $this->master_model->addObat()){
				$this->tambah_obat_form();
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

	function add_item_jenis_sdm(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('jenis_sdm', 'Jenis SDM', 'trim|required|max_length[150]|callback_check_if_sdm_exists');

		if($this->form_validation->run() == FALSE){
			$this->item_usulan();
		}else{
			$this->load->model('master_model');
			if($query = $this->master_model->add_item_jenis_sdm()){
				$this->item_usulan();
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


}
?>