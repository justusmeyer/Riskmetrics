<?php

class PhotouploadsController extends ApplicationController{


	function index(){
		$this->layout = false;
			
		}
		
	function save(){
		
		$p = new Photoupload();
		$p->name = $name;
		$p->type = $_POST['type'];
		$p->save();
		
		echo $p->id;
		$this->render = false;
	}
	
	function show(){
		$this->layout = false;
		
		$typed = (isset($_POST['type'])) ? $_POST['type']:'0';
		
		$str= "type='$typed'";
		
		$this->products = Photouploads::get($str." order by id desc limit 200");
	}

	
	function editinfo()
	{
		$p = new Photoupload();
		$p = $p->find($this->args);
		$p->type = $_POST['type'];
		$p->update();
	}
	
	function delete()
	{
		$p = new Photoupload();
		$p = $p->find($this->args);
		$p->destroy();
	
		$this->redirect_to('/photouploads/show');
	}
	
	function rotate() {
	
		$p = new Photoupload();
		$p = $p->find($this->args);
		$filename =Photoupload::UPLOAD_DIR . $p->name;
		$degrees = $_GET['degree'];
	
		// Load
		$source = imagecreatefrompng($filename);
	
		// Rotate
		$rotate = imagerotate($source, $degrees, 0);
	
		// Output
		imagepng($rotate,$filename);
	
		// Free the memory
		imagedestroy($source);
		imagedestroy($rotate);
	}
	
	
	function edit() {
		$this->layout =false;
		$this->product = Photouploads::get($_GET['id']);
	}
	
	public function upload() {
		// A list of permitted file extensions
		
		$allowed = array('png', 'jpg', 'gif','zip');
		
		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
		
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			
			
			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}
		
			if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				$p = new Photoupload();;
				$name = $_FILES['upl']['name'];
				$p->name = $name;
				$p->type = $_POST['type'];
				$p->save();
				exit;
			}
		}
		
		echo '{"status":"error"}';
		exit;
		
	}
}
