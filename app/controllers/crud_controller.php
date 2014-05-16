<?php
class CrudController extends ApplicationController{
	
	protected $object = null;

	function index(){
		$this->render = "crud/index";
		
		$item = new $this->object;
		if(count($item->configurable))
			$this->items = $item->find('parent_id < 1');
		else
			$this->items = $item->find('all');
	}
	
	
	function create(){
		$object = new $this->object;
		$this->render = "crud/create";

		$this->getFields($object);
	}
	
	function add(){
		$item = $_POST['item'];
		
		$object = new $this->object;
		$object->__construct($item);
		
		if(count($object->configurable)){
			$configurable = array_shift($_POST['item']['configurable']);
			foreach($configurable as $key => $value){
				$object->$key = $value;
			}
			$object->save();
			foreach($_POST['item']['configurable'] as $configurable){
				$obj = new $this->object;
				$obj->parent_id = $object->id;
				foreach($configurable as $key => $value){
					$obj->$key = $value;
				}
				$obj->save();
			}
		}else{		
			$object->save();
		}
		$this->redirect_to("/{$this->controller}");
	}
	
	
	function view(){
		$this->render = "crud/view";
		
		$this->item = new $this->object;
		$this->item->find($this->args);
	}
	
	public function getFields($object){
		$result = mysql_query("show columns from ".ActiveRecord::pluralize($this->object)." where Field != 'id' and Field not like '%_id'");
		$this->fields = array();
		$this->configurables = array();
		
		
		
		while($field = mysql_fetch_assoc($result)){
			$temp =array();
		
			//	echo $field['Type']."<br />";
			preg_match('@(\w+)\(?(\d+)?\)?@i',$field['Type'], $matches);
			//	var_dump($matches);
				
			$type = (isset($matches[1]))?$matches[1]:'';
			$quantity = (isset($matches[2]))?$matches[2]:'';
				
				
			if(count($object->configurable) && in_array($field['Field'], $object->configurable)){
				$this->configurables[]=array(
						'name'=>$field['Field'],
						'type'=>$type,
						'quantity'=>$quantity
				);
			}else{
				$this->fields[]=array(
						'name'=>$field['Field'],
						'type'=>$type,
						'quantity'=>$quantity
				);
			}
		}
		
	}
}