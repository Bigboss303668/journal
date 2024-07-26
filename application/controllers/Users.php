<?php
    class Users extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') !== TRUE){
                redirect('login');
            }
        }

        public function index(){
            $data['title'] = 'User List';

            $data['users'] = $this->User_model->get_users();

            $this->load->view('template/loginheader');
			$this->load->view('admin/users/index', $data);
			$this->load->view('template/loginfooter');

        }

        public function view($userid) {
            $data['title'] = 'User Details';

            $data['user'] = $this->User_model->get_specific_user($userid);

            $this->load->view('template/loginheader');
            $this->load->view('admin/users/view', $data);
            $this->load->view('template/loginfooter');

        }


        public function delete($userid){
            $this->User_model->delete_user($userid);
            redirect('admin/users');
        }

        public function edit($userid) {
            $data['title'] = 'Edit User';

            $data['user'] = $this->User_model->get_specific_user($userid);
            $data['roles'] = $this->User_model->get_roles();

            $this->load->view('template/loginheader');
			$this->load->view('admin/users/edit', $data);
			$this->load->view('template/loginfooter');

        }

        public function update() {
            $this->User_model->update_user();
            redirect('admin/users');
        }

        public function add(){
            $data['title'] = 'Add User';

            $data['roles'] = $this->User_model->get_roles();

            $this->load->view('template/loginheader');
            $this->load->view('admin/users/add', $data);
            $this->load->view('template/loginfooter');
        }

        public function insert() {
            if ($this->input->post()) {
                $complete_name = $this->input->post('complete_name');          
                $email = $this->input->post('email');
                $role = $this->input->post('role');
                $pword = $this->input->post('password');
                $status = $this->input->post('status') == 'on' ? 1 : 0;
        
                
                if ($_FILES['profileImg']['name']) {
                    
                    $config['upload_path'] = './assets/images/users/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048; // 2MB max size
        
                    $this->load->library('upload', $config);
        
                    if ($this->upload->do_upload('profileImg')) {
                        $data = $this->upload->data();
                        $profileImg = $data['file_name'];
                    } else {
                        // If file upload fails, set a default profile picture
                        $profileImg = 'noimage.png';
                    }
                } else {
                    // If no profile picture is uploaded, set a default profile picture
                    $profileImg = 'noimage.png';
                }
        
        
                // Prepare data to be inserted into the database
                $data = array(
                    'complete_name' => $complete_name,
                    'email' => $email,
                    'pword' => $pword,
                    'profile_pic' => $profileImg,
                    'status' => $status,
                    'role' => $role
                );
        
                // Insert the data into the database
                $inserted = $this->db->insert('users', $data);
        
                // Check if insertion was successful
                if ($inserted) {
                    // Return success response
                    $response = array('status' => 'success');
                } else {
                    // Return error response
                    $response = array('status' => 'error', 'message' => 'Failed to add user.');
                }
        
                // // Send JSON response
                // echo json_encode($response);
                // return;
                redirect('admin/users');
            }
        }
    }