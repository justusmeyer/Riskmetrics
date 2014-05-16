<?php
class Ourshopsection extends ActiveRecord{

static $link_category = array('blogpost','contact', 'events','group','media','races','shop','welcome','comingsoon');
static $link_number = array('1','2','3','4','5','6','7','8','9','10');

	public function getSet(){
		$query = "SELECT * FROM carousels where page_type ='shop'";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getOne(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 1";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getTwo(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 2";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getThree(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 3";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getFour(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 4";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getFive(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 5";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getSix(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 6";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getSeven(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 7";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getEight(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 8";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getNine(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 9";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
	
	public function getTen(){
		$query = "SELECT * FROM carousels where page_type='shop' and number = 10";
		$result = @mysql_query($query);
		$group = new Group($result, 'Ourshopsection');
		return $group;
	}
}
