<?php
class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_users() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role', 'left');
        $this->db->where('email!=', $this->session->userdata('email'));
        $this->db->where('role!=', 2);
        $query = $this->db->get();
       
        return $query->result_array();
    }

    public function get_specific_user($userid) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role', 'left');
        $this->db->where('userid', $userid);
        $query = $this->db->get();
       
        return $query->row_array();
    }

    public function get_roles() {

        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function delete_user($userid) {
        $query = $this->db->get_where('users', array('userid' => $userid));
        $data =  $query->row_array();

        $fullPathToDelete = 'assets/images/users/'. $data['profile_pic'];

        if (file_exists($fullPathToDelete) && $data['profile_pic'] !== 'noimage.png') {
            unlink($fullPathToDelete);
        }
        
        $this->db->where('userid', $userid);
        $this->db->delete('users');
    }

    public function update_user() {
        $query = $this->db->get_where('users', array('userid' => $this->input->post('userid')));
        $data =  $query->row_array();

        $fullPathToDelete = 'assets/images/users/'. $data['profile_pic'];

        if (!empty($_FILES['profileImg']['name'])) {

            $config['upload_path'] = './assets/images/users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profileImg')) {
                $data = $this->upload->data();
                $profileImg = $data['file_name'];

                if (file_exists($fullPathToDelete) && $data['profile_pic'] !== 'noimage.png') {
                    unlink($fullPathToDelete);
                }
            }
        } else {
            $profileImg = $data['profile_pic'];
        }

        $status = $this->input->post('status') == 'on' ? 1 : 0;

        $data = array(
            'complete_name' => $this->input->post('complete_name'),
            'email' => $this->input->post('email'),
            'status' => $status,
            'role' => $this->input->post('role'),
            'profile_pic' => $profileImg
        );

        $this->db->where('userid', $this->input->post('userid'));
        return $this->db->update('users', $data);
    }

    public function get_user_count() {
        $this->db->from('users');
        return $this->db->count_all_results();
    }
}
