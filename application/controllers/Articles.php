<?php
class Articles extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    public function index($page = 'index'){
        $data['title'] = 'Article List';

        $data['articles'] = $this->Article_model->get_articles();

        $this->load->view('template/loginheader');
        $this->load->view('admin/articles/'.$page, $data);
        $this->load->view('template/loginfooter');
    }

    public function edit($articleid) {
        $data['title'] = 'Edit Article';

        $data['article'] = $this->Article_model->get_specific_article($articleid);
        $data['b'] = $this->ArticleAuthor_model-> get_specific_article_author($articleid);
        $data['a'] = $this->Author_model->get_authors();
        $data['volumes'] = $this->Volume_model->get_all_volumes();
        

        // echo var_dump($data['b']);

        $this->load->view('template/loginheader');
        $this->load->view('admin/articles/edit', $data);
        $this->load->view('template/loginfooter');
    }

    public function update() {
        $this->Article_model->update_article();
        redirect('admin/articles');
    }

    public function view($articleid) {
        $data['title'] = 'Article Details';

        $data['article'] = $this->Article_model->get_specific_article($articleid);

        $this->load->view('template/loginheader');
        $this->load->view('admin/articles/view', $data);
        $this->load->view('template/loginfooter');

    }

    public function delete($articleid) {
        $this->Article_model->delete_article($articleid);
        redirect('admin/articles');
    }

    public function add(){
        $data['title'] = 'Add Article';
        $data['volumes'] = $this->Volume_model->get_all_volumes();
        $data['authors'] = $this->Author_model->get_authors();

        $this->load->view('template/loginheader');
        $this->load->view('admin/articles/add', $data);
        $this->load->view('template/loginfooter');
    }

    public function insert() {

        if (!empty($_FILES['file']['name'])) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $file_name = $data['file_name'];
            }
        }

        $data = array(
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'doi' => $this->generateDoi(),
            'volumeid' => $this->input->post('volume'),
            'filename' => $file_name,
            'published' => 0,
        );

        $this->db->insert('articles', $data);
        

        $lastInsertId = $this->db->insert_id();

        $authorsArray = $this->input->post('authors');

        if (!empty($authorsArray)) {
            foreach ($authorsArray as $author) {
                $article_author = array(
                    'articleid' => $lastInsertId,
                    'auid' => $author,
                );

                $this->db->insert('article_author', $article_author);
            }
        }

        redirect('admin/articles');
    }

    public function publish($articleid){
        $this->Article_model->publish_article($articleid);
        redirect('admin/articles');
    }

    private function generateDoi() {
        $doi_prefix = '10.';

        $doi_suffix = random_string('alnum', 10);
        return $doi_prefix . $doi_suffix;
    }
}