<?php
/**
 * [控制器](http://codeigniter.org.cn/user_guide/general/controllers.html)
 * 
 * 一个控制器就是一个类文件，名称能够和 URI 关联在一起：http://ci-dev.com/pages/
 */
class Pages extends CI_Controller {

    public function view($page = 'home') {
        //启用分析器
        $this->output->enable_profiler(TRUE);
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                // Whoops, we don't have a page for that!
                show_404();
        }
        //打印当前环境常量
        echo 'ENVIRONMENT = ' . ENVIRONMENT;

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}