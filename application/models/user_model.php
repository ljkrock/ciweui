<?php
class User_model extends CI_Model {
	public function __construct()
    {

        $this->load->database();
    }

    //获取用户信息
    public function get_users($slug=false){
    	return 1;
    }

    //设置用户信息
    public function set_user($params){
    	$this->load->helper('url');
        $password = $this->input->post('password');
        //var_dump($password);
        
        $data = array();
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'sex' => $this->input->post('sex'),

        );
        var_dump($password);
        if(!empty($password)){
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $data['uptime'] = time();
        
        $data['isvip'] = 0;
        $data['status'] = 1;
        foreach ($params as $key => $value) {
            $data[$key]=$value;
        }

        if(!@$data['id']){
            $data['regtime'] = time();
        }
        var_dump($data);die;
        return $this->db->replace('user', $data);
        var_dump($a);die;
    	
    }

    //验证登录
    public function check_auth(){
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $query = $this->db->get_where('user', array('email' => $email))->row_array();
        if($query){
            $res = password_verify ( $password , $query['password'] );
            if($res){
                
                $this->session->username = $query['username'];
                $this->session->islogin = 1;
                $this->session->uid = $query['id'];
            }
            return $res;
        }else{
            return false;
        }
    }

    public function get_info($uid){
        return $this->db->get_where('user', array('id' => $uid))->row_array();
    }

    public function valid_email($str){
        $uid = $_SESSION['uid'];
        $info = $this->get_info($uid);
        if($info['email'] == $str){
            return true;
        }else{
            $res = $this->db->get_where('user', array('email' => $str))->row_array();
            if($res){
                return false;
            }else{
                return true;
            }
        }
    }
}