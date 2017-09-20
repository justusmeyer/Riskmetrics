<?php
class GtmsController extends ApplicationController{
	var $access = "private";
	

	function index(){
		$this->redirect_to('/gtms/current');
	}

	function current(){
		$this->layout = false;
	}

}