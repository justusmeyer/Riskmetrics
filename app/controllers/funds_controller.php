<?php
class FundsController extends ApplicationController{
	var $access = "private";
	

	function index(){
		$fund =  new fund();
		$this->funds = $fund->getSummary();
		
	
	}
	
	
	
	}
