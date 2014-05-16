<?php
/**
 * ApplicationController is the base class of all the controllers
 * @author Ivan Grosny
 * @version 1.0
 * @package lib
 */

class ApplicationController
{
	/**
	 * 
	 * Tell if the action needs to be draw
	 * @var boolean
	 */
	var $render = true;
	/**
	 * 
	 * Defines which layout is going to be use. The file should be in app/views/application/*.php 
	 * @var string
	 */
	var $layout = 'layout';
	/**
	 * 
	 * Defines the access level of the action and when the contrstuctor is loaded is validate the condition
	 * 
	 * @var string should be public or private
	 * @see __construct()
	 * 
	 */
	var $access = 'public';
	
	
	var $access_type = 'admin';
	/**
	 * When a controller is created here is where it start, like every other object the controller
	 * defines the basic information, in this case it also checks the access level
	 * 
	 * It also set the layout configuration for anyone to use ir
	 */
	public function __construct()
	{
		global $controller, $action;
		$this->controller = $controller;
			
		
		foreach($_SESSION as $param=>$value)
		{
			if(substr($param,0,1) === ucfirst(substr($param,0,1)))
				$this->$param = unserialize($_SESSION[$param]);
		}
		if($this->access == 'private')
		{	
			if(!isset($this->User))
				$this->redirect_to('/');
		}else{
			
			
		}
		

	}
	
	/**
	 * Funcion que redirije a donde sea
	 *
	 * @param String url la direccion a donde quiero enviarlo
	 */
	public function redirect_to($url)
	{
		$this->layout = false;
		$this->render = false;
		header('Location: '.$url);
		exit();
	}
	
	
	/**
	 * When the object is going to die is when it start the rendering
	 */
	public function __destruct()
	{
		global $controller, $action;
		
		if($this->render)
		{
			if($this->layout)
			{ 
				include dirname(__FILE__).'/../app/views/application/'.$this->layout.'.php';				
			}
			
			
			else
			{
				if($this->render !== true)
					include dirname(__FILE__).'/../app/views/'.$this->render.'.php';
				else		
					include dirname(__FILE__).'/../app/views/'.$controller.'/'.$action.'.php';
			}
		}
		
		foreach(get_object_vars($this) as $param=>$value)
		{
			if(substr($param,0,1) === ucfirst(substr($param,0,1)))
				$_SESSION[$param] = serialize($value);
		}
	}

	function render()
	{
		global $controller, $action;
		
		
		$file = dirname(__FILE__).'/../app/views/'.$controller.'/'.$action.'.php';
		
		if($this->render !== true)
			$file = dirname(__FILE__).'/../app/views/'.$this->render.'.php';
		
		
		if(is_file($file))
			include $file;
	}
	
	function reset(){
		//echo "as";
		foreach($_SESSION as $param=>$value)
		{
			//echo $param." ".$value." <br>";
			if(substr($param,0,1) === ucfirst(substr($param,0,1))){
				//echo $param;
				$this->$param = null;
				unset($this->$param);
				unset($_SESSION[$param]);
			}
		}
	}
	
	function logit($message){
		global $controller, $action;
		$fp = fopen(dirname(__FILE__).'/../log.txt', 'a');
		
		fwrite($fp,"*****************************************\n");
		fwrite($fp, date("Y-m-d H:i:s")."\n");
		fwrite($fp, "Controler: ".$controller."\n");
		fwrite($fp, "Action: ".$action."\n");
		if(isset($this->User)){
			fwrite($fp, $this->User->id." - ".$this->User->first_name." ".$this->User->last_name."\n");
		}
		if(!is_string($message)){
			fwrite($fp, print_r($message,true)."\n");
		}else{
			fwrite($fp, $message."\n");	
		}
		
		fwrite($fp,"*****************************************\n");
		
		fclose($fp);
	}
	
	function logthis($message,$file="email"){
		global $controller, $action;
		$fp = fopen(LOG_DIR.$file.'.txt', 'a');
		
		$line = date("Y-m-d H:i:s")."\t".$controller."\t".$action."\t";
		
		
		if(isset($this->User)){
			$line .= $this->User->id.":".$this->User->first_name." ".$this->User->last_name."\t";
		}else{
			$line .= "0:Anonymous\t";
		}
		
		$line .= $message."";
		
		fwrite($fp, $line."\n");
		
		fclose($fp);
	}	
	
	/*
	 * Change active city and redraw the layout
	 */
	function changeCity($city){
			AccountHelper::setSessionCity($city);
			$tmp_city = new City();
			$this->City = $tmp_city->find($city);
				
			$layout = new Layout();
			$this->Content = $layout->find($this->City->id);		
	}
	
	function draw($file, $options=array()){
		foreach($options as $key=>$value){
			$$key = $value;
		}
		$file = dirname(__FILE__).'/../app/views/'.$file.'.php';
		include $file;
	}
}
?>