<?php
class Hubobject{
	static public $link;
	
	function __construct(){
		self::$link = new mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME);	
	}
	
	
	function call($method, $params = array()){
	
		if(count($params))
			return $this->client->call($this->session, $method, $params);
		else
			return $this->client->call($this->session, $method);
	}
	
	function __destruct(){
		self::$link->close();
	}
}