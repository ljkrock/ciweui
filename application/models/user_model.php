<?php
class User_model extends CI_Model {
	public function __construct()
    {

        //$this->load->database();
    }

    //获取用户信息
    public function get_users($slug=false){
    	return 1;
    }

    //设置用户信息
    public function set_user(){
    	$this->load->helper('url');
    	$data  = $_POST;
    	var_dump($data);
    }
}