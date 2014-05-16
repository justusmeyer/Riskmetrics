<?php
class AdminController extends ApplicationController{
	
	function index(){
		$this->layout = false;
		$this->layout2 = false;

	}
	
	function login(){
		if($data = User::login($_POST['username'], $_POST['password'])){
			$this->User = $data;
		
		}
// 		var_dump($_POST);
// 		die;
		$this->redirect_to('/dashboard');
	}

}