<?php
class Register extends CI_Controller {

    public function index() {
        $this->load->view('template/header');
        $this->load->view('register/register');
        $this->load->view('template/footer');
    }
}