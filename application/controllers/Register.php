<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller{
    function __construct(){
        parent::__construct();
       
       
    }
    public function user(){
        $this->load->view('template/header');
        $this->load->view('register/index');
        $this->load->view('template/footer');
    }

}
?>