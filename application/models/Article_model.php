<?php
class Article_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_articles() {
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function get_specific_article($articleid) {
        $this->db->select('articles.articleid, articles.title, articles.doi, articles.date_published, articles.filename, articles.abstract, articles.keywords, articles.volumeid, volume.vol_name, 
            GROUP_CONCAT(DISTINCT users.complete_name ORDER BY users.complete_name SEPARATOR ", ") as author_names
        ');
        $this->db->from('articles');
        $this->db->join('volume', 'volume.volumeid = articles.volumeid', 'left');
        $this->db->join('article_author', 'article_author.articleid = articles.articleid', 'left');
        $this->db->join('authors', 'authors.auid = article_author.auid', 'left');
        $this->db->join('users', 'users.userid = authors.userid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $this->db->group_by('articles.articleid');
        $query = $this->db->get();

        return $query->row_array();
    }


    public function update_article() {

        $this->db->where('articleid', $this->input->post('articleid'));
        $query = $this->db->get('articles');

        $data = $query->row_array();

        $published = ($data['published'] == 1) ? 1 : 0;


        $fullPathToDelete = 'uploads/'. $data['filename'];

        if (!empty($_FILES['file']['name'])) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $file_name = $data['file_name'];

                if (file_exists($fullPathToDelete)) {
                    unlink($fullPathToDelete);
                }
            }
        } else {
            $file_name = $data['filename'];
        }

        $data = array(
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'volumeid' => $this->input->post('volume'),
            'filename' => $file_name,
            'published' => $published,
        );


        $this->db->where('articleid', $this->input->post('articleid')); 
        $this->db->update('articles', $data);


        $authorsArray = $this->input->post('authors');

        if (!empty($authorsArray)) {
            $this->db->where('articleid', $this->input->post('articleid'));
            $this->db->delete('article_author');

            foreach ($authorsArray as $author) {
                $article_author = array(
                    'articleid' => $this->input->post('articleid'),
                    'auid' => $author,
                );

                $this->db->where('articleid', $this->input->post('articleid'));
                $this->db->insert('article_author', $article_author);
            }
        }
    }

    public function delete_article($articleid) {
        $query = $this->db->get_where('articles', array('articleid' => $articleid));
        $data =  $query->row_array();

        $fullPathToDelete = 'uploads/'. $data['filename'];

        if (file_exists($fullPathToDelete)) {
            unlink($fullPathToDelete);
        }

        $this->db->where('articleid', $articleid);
        $this->db->delete('articles');
    }

    public function publish_article($articleid) {
        $status = ($this->get_current_publish_status($articleid) == 1 ) ? 0 : 1;

        if ($status == 1) {
            $this->db->set('date_published', 'NOW()', FALSE);
        }

        $this->db->set('published', $status);
        $this->db->where('articleid', $articleid);
        $this->db->update('articles');
    }

    private function get_current_publish_status($articleid) {
        $query = $this->db->get_where('articles', array('articleid' => $articleid));
        return $query->row()->published;
    }

    public function get_article_count() {
        $this->db->from('articles');
        return $this->db->count_all_results();
    }

    public function get_published_articles() {
        $this->db->select('articles.*');
        $this->db->from('articles');
        $this->db->join('volume', 'volume.volumeid = articles.volumeid', 'left');
        $this->db->where('articles.published', 1);
        $this->db->where('volume.published', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_archived_articles() {
        $this->db->select('volume.volumeid, volume.vol_name, volume.coverImg, volume.description, 
                           articles.articleid, articles.title, articles.doi, articles.date_published, articles.filename, articles.abstract, articles.published, 
                           GROUP_CONCAT(DISTINCT users.complete_name ORDER BY users.complete_name SEPARATOR ", ") as author_names');
        $this->db->from('volume');
        $this->db->join('articles', 'articles.volumeid = volume.volumeid AND articles.published = 1', 'left');
        $this->db->join('article_author', 'article_author.articleid = articles.articleid', 'left');
        $this->db->join('authors', 'authors.auid = article_author.auid', 'left');
        $this->db->join('users', 'users.userid = authors.userid', 'left');
        $this->db->where('volume.archived', 1); // gi change from published to archived
        $this->db->group_by('volume.volumeid, articles.articleid');
        $this->db->order_by('volume.date_at DESC');

        $query = $this->db->get();
        $result = $query->result_array();

        $volumes = [];
        foreach ($result as $row) {
            $volumeId = $row['volumeid'];
            if (!isset($volumes[$volumeId])) {
                $volumes[$volumeId]['vol_name'] = $row['vol_name'];
                $volumes[$volumeId]['coverImg'] = $row['coverImg'];
                $volumes[$volumeId]['description'] = $row['description'];
                $volumes[$volumeId]['articles'] = [];
            }

            unset($row['volume_id']);
            $volumes[$volumeId]['articles'][] = $row;
        }

        return $volumes;
    }
}
