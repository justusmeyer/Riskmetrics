<?php
class Mvo extends ActiveRecord{

	public function getAssetclass(){
		$query = "SELECT * FROM mvos";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}

}
