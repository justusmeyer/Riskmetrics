<?php
class Mvo extends ActiveRecord{

	public function getAssetclass(){
		$query = "SELECT *, 
(mean_return/100)*(weight_1/100) as product_1,
(mean_return/100)*(weight_2/100) as product_2,
(mean_return/100)*(weight_3/100) as product_3,
(mean_return/100)*(weight_4/100) as product_4,
(mean_return/100)*(weight_5/100) as product_5,
pow(mean_stdev/100,2) as var,
(2*(mean_return/100)+pow(mean_stdev/100,2))/(1-(mean_return/100)+sqrt(pow(1+(mean_return/100),2)+2*pow((mean_stdev/100),2))) as R
FROM Riskmetrics.mvos";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}

	public function getTrans1(){
		$query = "Select mean_stdev from mvos where id=1";
			$result = @mysql_query($query);
			$group = new Group($result, 'Mvo');
			return $group;
		}
		
	public function getTrans2(){
		$query = "Select mean_stdev from mvos where id=2";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans3(){
		$query = "Select mean_stdev from mvos where id=3";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans4(){
		$query = "Select mean_stdev from mvos where id=4";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans5(){
		$query = "Select mean_stdev from mvos where id=5";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans6(){
		$query = "Select mean_stdev from mvos where id=6";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans7(){
		$query = "Select mean_stdev from mvos where id=7";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans8(){
		$query = "Select mean_stdev from mvos where id=8";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans9(){
		$query = "Select mean_stdev from mvos where id=9";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans10(){
		$query = "Select mean_stdev from mvos where id=10";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans11(){
		$query = "Select mean_stdev from mvos where id=11";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans12(){
		$query = "Select mean_stdev from mvos where id=12";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
	public function getTrans13(){
		$query = "Select mean_stdev from mvos where id=13";
		$result = @mysql_query($query);
		$group = new Group($result, 'Mvo');
		return $group;
	}
	
}
