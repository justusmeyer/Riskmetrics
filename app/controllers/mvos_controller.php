<?php
class MvosController extends ApplicationController{
	var $access = "private";
	

	function index(){

		$mvo =  new mvo();
		$this->mvos = $mvo->getAssetclass();

	}
	
	public function addweight(){
		$this->render = false;
	
	
		if (isset($_POST['mvo']['id']) && $_POST['mvo']['id'] > 0) {
			$mvo = new mvo($_POST['mvo']);
				
			$mvo->update();
	
			$adders = array();
				
		} else {
			$mvo = new Mvo($_POST['mvo']);
			$mvo->save();
			echo $mvo->id;
		}
	}
}