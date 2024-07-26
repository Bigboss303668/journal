<?php
class Author_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function get_authors() {
        $this->db->select('*');
        $this->db->from('authors');
        $this->db->join('users', 'users.userid = authors.userid', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_specific_author($auid) {
        $this->db->select('*');
        $this->db->from('authors');
        $this->db->join('users', 'users.userid = authors.userid', 'inner');
        $this->db->where('auid', $auid);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function delete_author($userid) {
        $query = $this->db->get_where('users', array('userid' => $userid));
        $data =  $query->row_array();

        $fullPathToDelete = 'assets/images/users/'. $data['profile_pic'];

        if (file_exists($fullPathToDelete) && $data['profile_pic'] !== 'noimage.png') {
            unlink($fullPathToDelete);
        }

        $this->db->where('userid', $userid);
        $this->db->delete('authors');

        $this->db->where('userid', $userid);
        $this->db->delete('users');
    }

    public function update_author() {

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

        $userdata = array(
            'complete_name' => $this->input->post('author_name'),
            'email' => $this->input->post('email'),
            'profile_pic' => $profileImg
        );

        $authordata = array(
            'contact_num' => $this->input->post('contact'),
        );


        $this->db->where('userid', $this->input->post('userid'));
        $this->db->update('users', $userdata);


        $this->db->where('auid', $this->input->post('authorid')); 
        $this->db->update('authors', $authordata);
    }
}
