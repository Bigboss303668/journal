<?php
    class Authors extends CI_Controller{
        function __construct(){
            parent::__construct();
            if($this->session->userdata('logged_in') !== TRUE){
                redirect('login');
            }
        }
        
        public function index($page = 'index'){
            $data['title'] = 'Author List';

            $data['authors'] = $this->Author_model->get_authors();

            $this->load->view('template/loginheader');
			$this->load->view('admin/authors/'.$page, $data);
			$this->load->view('template/loginfooter');
        }

        public function delete($userid) {
            $this->Author_model->delete_author($userid);
            redirect('admin/authors');
        }

        public function edit($auid) {
            $data['title'] = 'Edit Author';

            $data['author'] = $this->Author_model->get_specific_author($auid);

            $this->load->view('template/loginheader');
			$this->load->view('admin/authors/edit', $data);
			$this->load->view('template/loginfooter');

        }

        public function update() {
            $this->Author_model->update_author();
            redirect('admin/authors');
        }

        public function view($auid) {
            $data['title'] = 'Author Details';

            $data['author'] = $this->Author_model->get_specific_author($auid);

            $this->load->view('template/loginheader');
            $this->load->view('admin/authors/view', $data);
            $this->load->view('template/loginfooter');

        }

        public function add(){
            $data['title'] = 'Add Author';

            $this->load->view('template/loginheader');
            $this->load->view('admin/authors/add', $data);
            $this->load->view('template/loginfooter');
        }

        public function insert() {
            if ($this->input->post()) {
                $complete_name = $this->input->post('complete_name');          
                $email = $this->input->post('email');
                $role = 2;
                $pword = $this->input->post('password');
                $status = 1;
        
                
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
                    
                    $lastInsertId = $this->db->insert_id();

                    $authorData = array(
                        'userid' => $lastInsertId,
                        'contact_num' => $this->input->post('contact_num')
                    );

                    $authorInserted = $this->db->insert('authors', $authorData);

                    $response = array('status' => 'success');
                } else {
                    // Return error response
                    $response = array('status' => 'error', 'message' => 'Failed to add user.');
                }
        
                // // Send JSON response
                // echo json_encode($response);
                // return;
                redirect('admin/authors');
            }
        }
    }