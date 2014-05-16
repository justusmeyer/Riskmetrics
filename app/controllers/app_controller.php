<?php
class AppController extends ApplicationController{
	
	function index(){
		$this->layout = false;
		
	}
	
	function login(){
		if($data = User::login($_POST['username'], $_POST['password'])){
			$this->User = $data;
		
		}
		$this->redirect_to('/dashboards');
	}
}