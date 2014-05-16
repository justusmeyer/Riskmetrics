<?php
/**
 * Archivo que conotrla el levantado de toda la aplicacion
 * es la que ejecuta el controller
 * @author Ivan Grosny
 * @version 1.0
 * 
 */

include '../config/enviroment.php';
include '../config/'.ENVIROMENT.'.php';
include '../lib/functions.php';

require_once '../lib/activerecord.php';
require_once '../lib/collection.php';
require_once '../lib/application_controller.php';
require_once '../lib/ajax_controller.php';
require_once '../lib/validator.php';
require_once '../lib/MCAPI.class.php';
require_once '../lib/flash.php';
require_once '../lib/group.php';
require_once '../lib/image.php';
require_once '../lib/phpPayPal.php';
require_once '../lib/S3.php';
require_once '../lib/class.phpmailer.php';
require_once '../lib/phpquery.php';

set_include_path('../lib');


require_once '../lib/S3.php';

if (isset($_POST["PHPSESSID"])) {
	session_id($_POST["PHPSESSID"]);
} else if (isset($_GET["PHPSESSID"])) {
	session_id($_GET["PHPSESSID"]);
}

session_start();

connect_db();



$request = explode('/',strtolower(substr($_SERVER["REQUEST_URI"],1)));



if(count($request)){
	$controller = $request[0];
	if(!isset($request[1]))
		$action = 'index';
	else
		$action =$request[1];
	

	if(isset($request[2]))
		$args = $request[2];
	else
		$args = null;
}
/**
 * Makes the redirection 
 */
if($controller=="deal"||$controller=="r"){
	if(!$args){
		$args=$action;
		$action="index";
	}else{
		$temp = $args;
		$args= $action;
		$action =$temp;
	}
}

if(!$controller)
{
	header('Location: /app');
	exit;	
}

if(strpos($controller,"?"))
	$controller = substr($controller,0,strpos($controller,"?"));

if(!is_file('../app/controllers/'.$controller.'_controller.php'))
{
	header('Location: /404.php');
	exit;
}
else
{
	include '../app/controllers/'.$controller.'_controller.php';
}

$tmp_controller = $controller.'Controller';

$cw_controller = new $tmp_controller;


if($cw_controller->access == 'private')
{	
	if(!isset($cw_controller->User))
		$cw_controller->redirect_to('/app');
}




if(!$action)
	$action = 'index';

if(strpos($action,"?"))
	$action = substr($action,0,strpos($action,"?"));
	
if($args)
	$cw_controller->args = $args;

if(!method_exists($cw_controller, $action))
{
	header('Location: /404.php');
	exit;
}
else
{
	$cw_controller->action = $action;
	$cw_controller->$action();
}

?>