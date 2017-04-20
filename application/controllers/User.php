<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
		$con = $this->router->fetch_class();  
		$func = $this->router->fetch_method();
		//var_dump($con,$func);  
		$con=='user' && ($func=='create' || $func=='login')?'':is_login();
		// if($con=='user' && ($func=='create' || $func=='login')){

		// }else{
		// 	is_login();
		// }
	}

	//个人信息添加
	public function create(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	
		//验证表单
    	$this->form_validation->set_rules('username', '用户名', 'required');
    	$this->form_validation->set_rules('password', '密码', 'required');
    	$this->form_validation->set_rules('email', '邮箱', 'required|valid_email|is_unique[user.email]');
    	

    	if ($this->form_validation->run() === FALSE)
		{
			//添加表单
		    $this->load->view('base/header', $a=1);
		    $this->load->view('user/create');
		    $this->load->view('base/footer');
		}else{
			//文件上传
			$config['upload_path']      = './uploads/';
	        $config['allowed_types']    = 'gif|jpg|png';
	        
			$this->load->library('upload', $config);
			$error = array();
			$data = array();
	        if (!$this->upload->do_upload('avatar'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
	        }
	        
	        
	        //数据收集
	        $params = array();
	        $params['avatar'] = $config['upload_path'].$data['upload_data']['file_name'];
	        //var_dump($data);
	        //var_dump($params);
			$res =$this->user_model->set_user($params);
			if($res && !$error){
				$this->load->view('base/header');
				$this->load->view('base/success',array('tips'=>'注册'));
				$this->load->view('base/footer');
			}else{
				$this->load->view('base/header');
				$this->load->view('base/fail',array('tips'=>'注册'));
				$this->load->view('base/footer');
			}
		}

	}

	//个人主页
	public function index(){
		$userinfo = $this->user_model->get_info(intval($_SESSION['uid']));
		if(!$userinfo){
			redirect('/user/login/', 'refresh');
		}
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	
		//验证表单
    	$this->form_validation->set_rules('username', '用户名', 'required');
    	$this->form_validation->set_rules('email', '邮箱',array('required',array($this->user_model, 'valid_email')));


    	

    	if ($this->form_validation->run() === FALSE&&$userinfo)
		{
			//添加表单
		    $this->load->view('base/header', $userinfo);
		    $this->load->view('user/index',$userinfo);
		    $this->load->view('base/footer');
		}else{
			//文件上传
			$config['upload_path']      = './uploads/';
	        $config['allowed_types']    = 'gif|jpg|png';
	        
			$this->load->library('upload', $config);
			$error = array();
			$data = array();
	        if (!$this->upload->do_upload('avatar'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
	        }

	        //var_dump($data);die;
			//数据收集
	        $params = array();
	        if(@$data['upload_data']['file_name']){
	        	$params['avatar'] = $config['upload_path'].$data['upload_data']['file_name'];
	        }	        
	        $params['id'] = $userinfo['id'];
	        //var_dump($params);die;
	        //var_dump($_POST);die;
	        //var_dump($params);
			$res =$this->user_model->set_user($params);
			if($res){
				$this->load->view('base/header');
				$this->load->view('base/success',array('tips'=>'修改'));
				$this->load->view('base/footer');
			}else{
				$this->load->view('base/header');
				$this->load->view('base/fail',array('tips'=>'修改'));
				$this->load->view('base/footer');
			}
		}

	}

	//用户登录
	public function login(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		//验证表单
    	$this->form_validation->set_rules('email', '登录邮箱', 'required');
    	$this->form_validation->set_rules('password', '密码', 'required');
		if($this->form_validation->run() === FALSE){
			
			$this->load->view('base/header');
		    $this->load->view('user/login');
		    $this->load->view('base/footer');
			
		}else{
			
		    $res = $this->user_model->check_auth();
		    if($res){
		    	redirect('/user/index/', 'refresh');
		    }else{
		    	$this->load->view('base/header');
				$this->load->view('base/fail');
				$this->load->view('base/footer');
		    }

		}
	}
}