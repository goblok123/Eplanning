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

  function lihat_usulan_diklat($id_usulan, $id_unit, $boleh_ketahui){
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

    echo "$hak";
    echo "$boleh_ketahui";
    $data['boleh_ketahui'] = $boleh_ketahui;
    $this->load->model('site2_model');
    $data['nama_unit'] = $this->site2_model->cari_nama_unit($id_unit);
    $data['all'] = $this->site2_model->cari_usulan_diklat($id_usulan);
    $data['sudah_diketahui'] =  $this->site2_model->status_diketahui($id_usulan);

    $this->load->view('lihat/lihat_usulan_diklat',$data);

    $this->load->view('template/footer');

  }

  function lihat_usulan_obat($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_sdm($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_bhp($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('tambah_usulan_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

   function lihat_usulan_alat($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_pemeliharaan_alat($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_gedung($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

   function lihat_usulan_pemeliharaan_gedung($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_gaji_non($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_gaji_pns($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

  function lihat_usulan_perencanaan_pendapatan($id_usulan, $id_unit, $boleh_ketahui){
    $hak = $this->session->userdata('hakAkses');
    $this->load->model('site2_model');
    $data['boleh_ketahui'] = $boleh_ketahui;
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

   function buka_ketahui_usulan(){
    
    $id_unit = $this->session->userdata('id_unit');
    $this->load->model('site2_model');
    $data['unit_user'] = $this->session->userdata('nama_unit');
    $data['usulan_unit'] = $this->site2_model->cari_usulan_berdasarkan_unit($id_unit);

    $hak = $this->session->userdata('hakAkses');
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

    $this->load->view('ketahui_usulan',$data);

    $this->load->view('template/footer');
  }

  function template(){

    $hak = $this->session->userdata('hakAkses');
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

  }

   function buka_detail_usulan($id, $type, $id_unit){
    $type = str_replace("%20"," ",$type);
    
    $hak = $this->session->userdata('hakAkses');


    if($hak == 'Penanggung Jawab'){
       $boleh_ketahui = 1;
    }else if($hak == 'Administrator'){
      $boleh_ketahui = 1;
    }else{
       $boleh_ketahui = 0;
    }

    if($type == "DIKLAT"){
      $this->lihat_usulan_diklat($id, $id_unit, $boleh_ketahui);
    }else if ($type == "OBAT") {
      $this->lihat_usulan_obat($id, $id_unit, $boleh_ketahui);
    }else if ($type == "SDM") {
      $this->lihat_usulan_sdm($id, $id_unit, $boleh_ketahui);
    }else if ($type == "BHP") {
      $this->lihat_usulan_bhp($id, $id_unit, $boleh_ketahui);
    }else if ($type == "ALAT") {
      $this->lihat_usulan_alat($id, $id_unit, $boleh_ketahui);
    }else if ($type == "PEMELIHARAAN ALAT") {
      $this->lihat_usulan_pemeliharaan_alat($id, $id_unit, $boleh_ketahui);
    }else if ($type == "GEDUNG") {
      $this->lihat_usulan_gedung($id, $id_unit, $boleh_ketahui);
    }else if ($type == "PEMELIHARAAN GEDUNG") {
      $this->lihat_usulan_pemeliharaan_gedung($id, $id_unit, $boleh_ketahui);
    }else if ($type == "GAJI NON PNS") {
     $this->lihat_usulan_gaji_non($id, $id_unit, $boleh_ketahui);
    }else if ($type == "GAJI PNS") {
      $this->lihat_usulan_gaji_pns($id, $id_unit, $boleh_ketahui);
    }else if ($type == "PERENCANAAN PENDAPATAN") {
      $this->lihat_usulan_perencanaan_pendapatan($id, $id_unit, $boleh_ketahui);
    }

  }

  function ketahui_usulan($id_usulan){
    $this->load->model('site2_model');
    $this->site2_model->ketahui_usulan($id_usulan);

    $this->buka_ketahui_usulan();
  }

  function batalkan_ketahui_usulan($id_usulan){
    $this->load->model('site2_model');
    $this->site2_model->batalkan_ketahui_usulan($id_usulan);

    $this->buka_ketahui_usulan();
  }



}
?>