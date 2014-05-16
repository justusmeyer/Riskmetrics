<?php
class User extends Hubobject{
	
	static function login($username, $password){
		$user = new User();
		$result = $user::$link->query("SELECT * FROM users where username='$username'");
		if($result->num_rows){
			$row = $result->fetch_assoc();

			$hashArr = explode(':', $row['password']);
			//echo md5($hashArr[1] . $password)." === ".$hashArr[0];
			if(md5($hashArr[1] . $password) === $hashArr[0]){
				return $row;
				
			}else{
				return false;
			}			
		}else{
			return false;
		}
	}
	
}