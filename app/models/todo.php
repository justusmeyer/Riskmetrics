<?php
class Todo extends ActiveRecord{
	
	static $todo_lengths = array('Weekly','Monthly', 'Quarterly','Long-Term');
	static $todo_type = array('Website','Operations','Buying','Marketing','Customer Problems','Vendor Problems','Office General','Event','PR','Finance');
	
	public function getWeekly(){
		$query = "SELECT * FROM todos where timeline like 'Weekly' order by category ASC";
		$result = @mysql_query($query);
		$group = new Group($result, 'Todo');
		return $group;
	}

	public function getMonthly(){
		$query = ("SELECT * FROM todos where timeline like 'Monthly' order by category ASC");
		$result = @mysql_query($query);
		$group = new Group($result, 'Todo');
		return $group;
	}
	
	public function getQuarterly(){
		$query = ("SELECT * FROM todos where timeline like 'Quarterly' order by category ASC");
		$result = @mysql_query($query);
		$group = new Group($result, 'Todo');
		return $group;
	}
	
	public function getLongterm(){
		$query = ("SELECT * FROM todos where timeline like 'Long-Term' order by category ASC");
		$result = @mysql_query($query);
		$group = new Group($result, 'Todo');
		return $group;
	}

}
