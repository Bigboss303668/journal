<?php
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('register/login');
        $this->load->view('template/footer');
    }

    public function auth() {
        $email    = $this->input->post('email',TRUE);
        $password = $this->input->post('password',TRUE);

        $validate = $this->Login_model->validate($email,$password);

        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $id  = $data['userid'];
            $name = $data['complete_name'];
            $email = $data['email'];
            $role = $data['role'];
            $profile_pic = $data['profile_pic'];

            $sesdata = array(
                'userid'  => $id,
                'complete_name' => $name,
                'email'     => $email,
                'profile_pic' => $profile_pic,
                'role'     => $role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($role == 1){
                redirect('page/index');
     
            // access login for staff
            }elseif($role === '2'){
                redirect('page/staff');
     
            // access login for author
            }else{
                redirect('page/author');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
}






















