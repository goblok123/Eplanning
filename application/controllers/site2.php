<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
  public function index()
  {
    $this->home();
  }
  
  public function home(){
  	$this->load->view("head");
  	$this->load->view("menu");
  	$this->load->view("content");
  	$this->load->view("footer");
  }
}