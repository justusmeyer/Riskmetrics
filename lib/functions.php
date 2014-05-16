<?php
/**
 * Archivo que guarda las funciones generales
 * @author Ivan Grosny
 * @version 1.0
 * @package lib
 */

/**
 * Funcion que se conecta con la base de datos utilizando los datos del config
 *
 * @return Boolean indicando si se pudo o no conectar a la base de datos
 */
function connect_db()
{
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	if(mysql_error())
		return 0;
	else
		return 1;
}

/**
 * Funcion que carga automaticamente los modelos
 *
 * @param String $class_name
 */
function __autoload($class_name) {
	
	$file = dirname(__FILE__).'/../app/models/'.strtolower($class_name) . '.php';
	if(strpos($class_name,"Helper"))
		$file = dirname(__FILE__).'/../app/helpers/'.strtolower(substr($class_name,0,strpos($class_name,"Helper"))) . '_helper.php';	
	if(is_file($file))
		require_once $file;
	else {
		$class = ActiveRecord::singulize($class_name);
		$file = dirname(__FILE__).'/../app/models/'.strtolower($class) . '.php';
		if (is_file($file)) {
			$str = 'class '.$class_name.' extends Collection { protected static $class = "'.$class.'"; }';
						
			eval($str);
		}
	}
}


function im_on($str)
{
	if(is_array($str))
	{
		foreach($str as $option)
			if(strrpos($_SERVER["REQUEST_URI"],$option)!==false)
				return true;
		$str = "";
	}
	if(strrpos($_SERVER["REQUEST_URI"],$str)===false)
		return false;
	else
		return true;
}


/**
 * Funcion que genera password automaticamente
 *
 * @param Integer $length el tamaño que debe tener el password
 * @param Integer $strength la complejidad del mismo
 */
function generate_password($length=9, $strength=0) {
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength & 2) {
        $vowels .= "AEUY";
    }
    if ($strength & 4) {
        $consonants .= '23456789';
    }
    if ($strength & 8) {
        $consonants .= '@#$%';
    }

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

function time_ago($time){
        $ts = time() - strtotime(str_replace("-","/",$time));
       
        if($ts>31536000) $val = round($ts/31536000,0).' '.ANO;
        else if($ts>2419200) $val = round($ts/2419200,0).' '.MES;
        else if($ts>604800) $val = round($ts/604800,0).' '.SEMANA;
        else if($ts>86400) $val = round($ts/86400,0).' '.DIA;
        else if($ts>3600) $val = round($ts/3600,0).' '.HORA;
        else if($ts>60) $val = round($ts/60,0).' '.MINUTO;
        else $val = $ts.' '.SEGUNDO;
       
        if($val>1 && strpos($val, "mes"))
         $val .= 'es';
        else if($val>1)
         $val .= 's';
        return $val;
}

function ilog($text){
	$gestor = fopen("log.txt", 'a+');
    fwrite($gestor, "\n");
	if(is_array($text))
    	fwrite($gestor, print_r($_FILES,true));
    else
    	fwrite($gestor, $text);
    fclose($gestor);	
}

function pluralize($str, $cant){
	if($cant > 1){
		return $str."s";
	}
	else{
		return $str;
	}
}

function populate(){
	$params = func_get_args();
	
	$matches = "";
	preg_match_all('/\$\d+/', $params[0], $matches);

	foreach($matches[0] as $match){
		$params[0] = str_replace($match, $params[substr($match,1)],$params[0]);
	}
	return $params[0];
}

/**
 * Function that returns a string only with ascii and none space for using on 
 * creating the url id of the deals
 * 
 * @param String $str
 */
function cleanURL($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
}

?>