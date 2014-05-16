<?php
class TodosController extends ApplicationController{
	var $access = "private";
	

	function index(){

		$todo =  new todo();
		$this->todos = $todo->getWeekly();

	}

	public function add(){
		$todo =  new Todo($_POST['todos']);
		$todo->save();
		$this->redirect_to('/dashboards');
	}

	public function create(){
		$this->render = 'todos/_todo_add';
		$this->action = 'add';
		if(isset($this->args)){
			$todo = new Todo();
			$this->todos = $todo->find($this->args);
		}
	}
	
	function edit(){
		$this->render = 'todos/_todo_add';
		$this->action = 'update/'.$this->args;
		$todo = new Todo();
		$this->todos = $todo->find($this->args);
	}
	
	function update(){
		$todo = new Todo();
		$todo->find($this->args);
	
		$todo->__construct($_POST['todos']);
		$todo->update();
	
		$adders = array();
	
		if(isset($_POST['new'])){
			$todo->addItems($_POST['new']);
		}
		$this->redirect_to('/dashboards');
	}
	
	function remove(){
		$todo = new Todo();
		$todo->find($this->args);
		$todo->destroy();
		
		$this->redirect_to('/dashboards');
	}
}


