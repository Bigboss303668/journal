<?php
    class Admin extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') !== TRUE){
                redirect('login');
            }
        }

        public function index(){

            $data['users'] = $this->User_model->get_user_count();
            $data['articles'] = $this->Article_model->get_article_count();
            $data['volumes'] = $this->Volume_model->get_volume_count();
           
            $this->load->view('template/loginheader');
			$this->load->view('admin/dashboard', $data);
			$this->load->view('template/loginfooter');
        }
    }