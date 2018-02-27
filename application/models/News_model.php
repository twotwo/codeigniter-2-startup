<?php
class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        //load cache library
        $this->load->library('MP_cache');
    }

    public function get_news($slug = FALSE) {
        //获取全部新闻
        if ($slug === FALSE) {
            $cachename = 'news_list';
            $data = $this->mp_cache->get($cachename);
            if ($data === FALSE) {
                $data = $this->db->get('news')->result_array();
                $this->mp_cache->write($data, $cachename, CACHE_TIME);
                log_message('debug', 'store cache '.$cachename);
            } 
            return $data;
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news() {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}