<?php

class Site2 extends CI_Controller
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

  function lihat_usulan_diklat($id_usulan, $id_unit){
    $this->load->view('template/header');
    $hak = $this->session->userdata('hakAkses');
    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_diklat($id_usulan);

    $this->load->view('lihat/lihat_usulan_diklat',$data);

    $this->load->view('template/footer');

  }

  function lihat_usulan_obat($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_obat($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_obat',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_sdm($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_sdm($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_sdm',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_bhp($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('tambah_usulan_model');
    $data['nama_unit'] = $this->tambah_usulan_model->cari_nama_unit($id_unit);
    $data['all'] = $this->tambah_usulan_model->usulan_bhp($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_bhp',$data);

    $this->load->view('template/footer');
  }

   function lihat_usulan_alat($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_alat($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_alat',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_pemeliharaan_alat($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_pemeliharaan_alat($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_pemeliharaan_alat',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_gedung($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_gedung($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_gedung',$data);

    $this->load->view('template/footer');
  }

   function lihat_usulan_pemeliharaan_gedung($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_pemeliharaan_gedung($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_pemeliharaan_gedung',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_gaji_non($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_gaji_non($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_gaji_non',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_gaji_pns($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_gaji_pns($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_gaji_pns',$data);

    $this->load->view('template/footer');
  }

  function lihat_usulan_perencanaan_pendapatan($id_usulan, $id_unit){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_perencanaan_pendapatan($id_usulan);

    $this->load->view('template/header');

    if($hak == 'Pengimput'){
      $this->load->view('menu/menu_pengimput');
      
    }else if($hak == 'Penanggung Jawab'){
      $this->load->view('menu/menu_penanggung_jawab');
    }else if($hak == 'Administrator'){
      $this->load->view('menu/menu_administrator');
    }else{
      $this->load->view('menu/menu_not_login');
    }

    $this->load->view('lihat/lihat_usulan_prencanaan_pendapatan',$data);

    $this->load->view('template/footer');
  }


}
?>