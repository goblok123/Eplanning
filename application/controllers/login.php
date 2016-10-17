<?php

class Login extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
	}

	function index()
	{
		$is_logged_in2 = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in2) || $is_logged_in2 != TRUE){
			$this->load->view('template/header');
			$this->load->view('menu/menu_not_login');
			$this->load->view('not_login');
			$this->load->view('template/footer');
		}else{
			$hak = $this->session->userdata('hakAkses');

			if($hak == 'pengimput'){
				$this->load->view('template/header');
				$this->load->view('menu/menu_pengimput');
				$this->load->view('Pengimput');
				$this->load->view('template/footer');
			}else if($hak == 'penanggungJawab'){
				$this->load->view('template/header');
				$this->load->view('menu/menu_penanggung_jawab');
				$this->load->view('Penanggung_Jawab');
				$this->load->view('template/footer');
			}else if($hak == 'administrator'){
				$this->load->view('template/header');
				$this->load->view('menu/menu_administrator');
				$this->load->view('Administrator');
				$this->load->view('template/footer');
			}
		}
	}

	function loginPage()
	{
		$this->load->view('template/header');
		$this->load->view('menu/menu_not_login');
		$this->load->view('login_form');
		$this->load->view('template/footer');
	}

	function validate_credentials(){
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if($query){
			$username1 = $this->input->post('username');
			$r = $this->membership_model->find_for_sesion($username1);
			$t = $this->membership_model->find_for_sesion($r->name_unit);

			$data = array(
					'username' => $this->input->post('username'),
					'is_logged_in' => true,
					'id_unit' => $t->name_unit,
					'hakAkses'=> $r->access,
				);

			$this->session->set_userdata($data);
			redirect('site/members_area');
		}else{
			$data['account_created'] = 'Username atau password Anda salah.<br/><br/> Silahkan coba lagi!';

			$this->load->view('template/header');
			$this->load->view('menu/menu_not_login');
			$this->load->view('login_form', $data);
			$this->load->view('template/footer');
		}
	}

	function signup()
	{
		if($this->adminHak()){
			$this->load->model('membership_model');
			$data['allUnit'] = $this->membership_model->find_all_unit();


			$this->load->view('template/header');
			$this->load->view('menu/menu_not_login');
			$this->load->view('signup_form',$data);
			$this->load->view('template/footer');
		}else{
			redirect('site/members_area');
		}
	}

	function create_member(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]|callback_check_if_username_exists');
		$this->form_validation->set_rules('hakAkses', 'Hak Akses', 'trim|required');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');


		if($this->form_validation->run() == FALSE){
			$this->signup();
		}
		else{
			$this->load->model('membership_model');

			if($query = $this->membership_model->create_member()){
				$data['account_created'] = 'Akun sudah tersimpan.<br/><br/>Anda bisa login sekarang.';

				$this->load->view('template/header');
				$this->load->view('menu/menu_not_login');
				$this->load->view('login_form', $data);
				$this->load->view('template/footer');
			}else{
				$this->signup();
			}

		}
	}

	function check_if_username_exists($requested_username){
		$this->load->model('membership_model');

		$username_available = $this->membership_model->check_if_username_exists($requested_username);

		if($username_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	// function check_if_email_exists($requested_email){
	// 	$this->load->model('membership_model');

	// 	$email_not_in_use = $this->membership_model->check_if_email_exists($requested_email);

	// 	if($email_not_in_use){
	// 		return TRUE;
	// 	}else{
	// 		return FALSE;
	// 	}
	// }

	function destroy_session(){
		$array_items = array('username', 'is_logged_in', 'unit', 'hakAkses');

		$this->session->unset_userdata($array_items);
		redirect('login');
	}

	function adminHak(){
		$is_logged_in2 = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in2) || $is_logged_in2 != TRUE){
			return FALSE;
		}else{
			$hak = $this->session->userdata('hakAkses');

			if($hak == 'administrator'){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	function lihat_item_usulan(){
		$this->load->model('master_model');
		$data['allObat'] = $this->master_model->find_all_obat();
		$data['allJsdm'] = $this->master_model->find_all_j_sdm();

		$this->load->view('template/header');
		$this->load->view('menu/menu_not_login');
		$this->load->view('item_usulan/lihat_item',$data);
		$this->load->view('template/footer');
	}
}