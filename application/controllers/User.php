<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
	}

	//个人信息添加
	public function create(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	//验证表单
    	$this->form_validation->set_rules('username', '用户名', 'required');
    	$this->form_validation->set_rules('password', '密码', 'required');
    	

    	if ($this->form_validation->run() === FALSE)
		{
		    $this->load->view('base/header', $a=1);
		    $this->load->view('user/create');
		    $this->load->view('base/footer');
		}

	}

	//个人主页
	public function index(){
		echo "<a href='/index.php/user/create'>点我</a>";
	}
}