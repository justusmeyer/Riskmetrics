<?php
class Validator{
	
	static function notEmpty($str){
		return empty($str)?true:false;
	}
	
	static function is_empty($str){
		$str = trim($str);
		return empty($str);
	}
	
	static function isEmail($email){
		return preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email);
	}
	
	static function hasHTML($str){
		return (strpos($str,"<")===false && strpos($str,">")===false)?false:true;
	//	return str_('/^[\<\>\%\;\(\)\&\+]+$/', $email);
	}
	
	static function isUnique($object, $column){
		$table_name = strtolower(ActiveRecord::pluralize(get_class($object)));
		$result  = mysql_query("select * from $table_name where $column='".$object->$column."'");
		if(mysql_error())
			return true;
			
		if(mysql_num_rows($result))
			return false;
		else
			return true;
	}
}