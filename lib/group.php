<?php
class Group implements Iterator, Countable {
	public $resource;
	public $model;
	public $position = 0;
	
	public function __construct($resource, $model){
		if($resource == ""){
			echo "Hay algun error";
		}
		$this->position = 0;
		$this->resource = $resource;
		$this->model = $model;
	}
	
	function rewind() {
        $this->position = 0;
        @mysql_data_seek($this->resource, $this->position);
    }

    function current() {
        mysql_data_seek($this->resource, $this->position);
        return new $this->model (mysql_fetch_assoc($this->resource));
    }

    function key() {
        return $this->position;
    }

    function next() {
        ++$this->position;
    }

    function valid() {
        return @mysql_data_seek($this->resource, $this->position);
    }
    
    function count(){
    	return mysql_num_rows($this->resource);
    }
}