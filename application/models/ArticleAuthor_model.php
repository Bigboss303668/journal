<?php
class ArticleAuthor_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_specific_article_author($articleid) {
        $this->db->select('article_author.auid');
        $this->db->where('articleid', $articleid);
        $query = $this->db->get('article_author');

        $result = $query->result_array();

        $auid_array = array_column($result, 'auid');

        return $auid_array;
    }
}
