<?php
class Flash{
	public static $errors = array();
	public static $notices = array();
	
	static function error($errors, $obj = null, $param= null){

		if(is_array($errors)){
			foreach($errors as $str){
				if(is_array($str)){
					list($str2, $obj2, $param2) = $str; 
					self::$errors[] = array($str2,$obj2,$param2);
					$_SESSION['errors'][] = array($str2,$obj2,$param2);
				}else{
					self::$errors[] = array($str,$obj,$param);
					$_SESSION['errors'][] = array($str,$obj,$param);
				}
			}
		}else{
			self::$errors[] = array($errors,$obj,$param);
			$_SESSION['errors'][] = array($errors,$obj,$param);	
		}
	}

	static function notice($str, $obj = null, $param= null){
		self::$notices[] = array($str,$obj,$param);
		$_SESSION['notices'][] = array($str,$obj,$param);
	}
	
	
	static function draw(){
		if(isset($_SESSION['errors']))
		foreach($_SESSION['errors'] as $error){
			echo "<div class=\"error{$error[1]} {$error[2]}\">{$error[0]}</div>";
		}
		if(isset($_SESSION['notices']))
		foreach($_SESSION['notices'] as $notice){
			echo "<div class=\"notice{$notice[1]} {$notice[2]}\">{$notice[0]}</div>";
		}
		$_SESSION['errors'] = null;
		$_SESSION['notices'] = null;
	}
	
	static function draw_json(){
		$errors = array();
		
		foreach($_SESSION['errors'] as $error){
			$errors[]=$error[0];
		}
		$_SESSION['errors'] = null;
		return $errors;
	}
	
	static function has(){
		return ((isset($_SESSION['errors']) && count($_SESSION['errors'])) || (isset($_SESSION['notices']) && count($_SESSION['notices'])))?true:false;
	}
	static function has_errors(){
		return ((isset($_SESSION['errors']) && count($_SESSION['errors'])))?true:false;
	}
	
}