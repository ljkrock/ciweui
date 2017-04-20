<?php 
function is_login(){
	if(!@$_SESSION['islogin']===1||!@$_SESSION['username']||@$_SESSION['uid']==null){
		redirect('/user/login/', 'refresh');
		exit();
	}else{
		define('IS_LOGIN',1);
	}
		
}