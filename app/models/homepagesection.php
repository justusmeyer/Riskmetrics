<?php
class Homepagesection extends ActiveRecord{

static $link_category = array('blogpost','contact', 'events','group','media','races','shop','welcome','comingsoon');
static $link_number = array('1','2','3','4','5','6','7');

	const UPLOAD_DIR = 'uploads/';

	public function getSet(){
		$query = "SELECT * FROM carousels where page_type ='welcome'";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getOne(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 1";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getTwo(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 2";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getThree(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 3";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getFour(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 4";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getFive(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 5";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getSix(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 6";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
	
	public function getSeven(){
		$query = "SELECT * FROM carousels where page_type='welcome' and number = 7";
		$result = @mysql_query($query);
		$group = new Group($result, 'Homepagesection');
		return $group;
	}
}