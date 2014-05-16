<?php
class AjaxController extends ApplicationController{
	var $access = 'public';
	

	
	function __destruct(){
		$return = array();
		
			
		foreach(get_object_vars($this) as $param=>$value)
		{
			if(substr($param,0,1) === ucfirst(substr($param,0,1)))
				$_SESSION[$param] = serialize($value);
		}
		
		foreach(get_object_vars($this) as $key=>$value){
			$return[$key]=$value;
		}
		
		if(Flash::has_errors()){
			$return["errors"] = Flash::draw_json();
		}
		
		echo json_encode($return);
	}
}