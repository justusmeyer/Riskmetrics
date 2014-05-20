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

}
