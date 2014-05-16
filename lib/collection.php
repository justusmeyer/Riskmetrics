<?php
class Collection{

	//this is a test
	static function get($params){
	
		$name = static::$class;
		
		$object = new $name;
		return $object->find($params);
	}
}