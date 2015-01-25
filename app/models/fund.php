<?php
class Fund extends ActiveRecord{

	static $fund_types = array(
							'Cash',
							'Government Bonds',
							'Corporate Bonds',
							'Absolute Return',
							'Hedged Equities',
							'Large Cap Equities',
							'Small Cap Equities',
							'EM Equities',
							'Private Equity',
							'Inflation Linked Bonds',
							'Commodities',
							'Commercial Real Estate',
							'Private Equity Real Estate');
	
	public function getSummary(){
		$query = "SELECT * from funds";
		$result = @mysql_query($query);
		$group = new Group($result, 'Fund');
		return $group;
	}
}