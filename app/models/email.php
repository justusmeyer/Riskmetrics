<?php
class Email extends ActiveRecord{
	
	public function getEmails(){
		$query = "SELECT id, email from emails order by id DESC";
		$result = @mysql_query($query);
		$group = new Group($result, 'Email');
		return $group;
	}
	
}

