<?php
class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        /**
         * 加载[URL 辅助函数](http://codeigniter.org.cn/user_guide/helpers/url_helper.html)
         */
        $this->load->helper('url_helper');
        /**
         * 加载[单元测试类](http://codeigniter.org.cn/user_guide/libraries/unit_testing.html)
         */
        $this->load->library('unit_test');
        //生产环境下禁用单元测试
        if (ENVIRONMENT === 'production') {
            $this->unit->active(FALSE);
        }
    }

    public function index() {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
    
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
	}
	
	/**
	 * 学习专用测试用例： 标准插入
	 */
	protected function _test_db_insert() {
		//初始化数据库
		$this->load->database();
		$title = '先生';
		$name = '李';
		$sql = "INSERT INTO ci_db_test (title, name) VALUES (".$this->db->escape($title).", ".$this->db->escape($name).")";
		$this->db->query($sql);
        $affected = $this->db->affected_rows();
        //应该插入了1条数据
        $this->unit->run($affected, 1, 'insert 1 record');
	}

    public function test() {
        $data['news'] = $this->news_model->get_news();
        //运行测试: 'test result', 'expected result', 'test name', 'notes'
        $this->unit->run($data['news'], 'is_array', 'get news from model');
		//逐条读取$query->result_array()
		echo '## read news'.PHP_EOL;
        foreach ($data['news'] as $row) {
            echo ' * '.$row['title'].PHP_EOL;
            // echo $row['slug'];
			// echo $row['text'];
			$this->unit->run($row['text'], 'is_string', 'read news');
		}
		// 测试一下数据库标准插入
		$this->_test_db_insert();
        // echo $this->unit->report();
        echo $this->unit->cli_report(); //详见https://github.com/ashiina/codeigniter-cli_unit_test
    }

    public function view($slug = NULL) {
        $data['news_item'] = $this->news_model->get_news($slug);
    
        if (empty($data['news_item'])) {
            show_404();
        }
    
        $data['title'] = $data['news_item']['title'];
    
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        /**
         * [表单辅助函数](http://codeigniter.org.cn/user_guide/helpers/form_helper.html)
         * 生成 form 元素
         */
        $this->load->helper('form');
        /**
         * [表单验证类](http://codeigniter.org.cn/user_guide/libraries/form_validation.html)
         */
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        //设置验证规则: form name, read name, rule, error info
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        //运行验证程序
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}