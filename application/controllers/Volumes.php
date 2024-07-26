<?php
class Volumes extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    public function index() {

        $data['title'] = 'Volume List';

        $data['volumes'] = $this->Volume_model->get_volumes();

        $this->load->view('template/loginheader');
        $this->load->view('admin/volumes/index', $data);
        $this->load->view('template/loginfooter');
    }

    public function add(){
        $data['title'] = 'Add Volume';

        $this->load->view('template/loginheader');
        $this->load->view('admin/volumes/add', $data);
        $this->load->view('template/loginfooter');
    }

    public function delete($volumeid) {
        $this->Volume_model->delete_volume($volumeid);
        redirect('admin/volumes');
    }

    public function insert() {

        if (!empty($_FILES['coverImg']['name'])) {

            $config['upload_path'] = './assets/images/volumes/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 5000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('coverImg')) {
                $data = $this->upload->data();
                $file_name = $data['file_name'];
            }
        } else {
            $file_name = 'default.png';
        }

        $data = array(
            'vol_name' => $this->input->post('vol_name'),
            'description' => $this->input->post('description'),
            'coverImg' => $file_name,
            'published' => 0,
            'archived' => 0,
        );

        $this->db->insert('volume', $data);

        redirect('admin/volumes');
    }

    public function edit($volumeid) {
        $data['title'] = 'Edit Volume';

        $data['volume'] = $this->Volume_model->get_specific_volume($volumeid);

        $this->load->view('template/loginheader');
        $this->load->view('admin/volumes/edit', $data);
        $this->load->view('template/loginfooter');
    }

    public function update() {
        $this->Volume_model->update_volume();
        redirect('admin/volumes');
    }

    public function publish($volumeid){
        $this->Volume_model->publish_volume($volumeid);
        redirect('admin/volumes');
    }

    public function archive($volumeid){
        $this->Volume_model->archive_volume($volumeid);
        redirect('admin/volumes');
    }
}

