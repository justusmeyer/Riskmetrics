<?php
/**
 * File ActiveRecord
 * 
 * I used the singularize from :
 * http://kuwamoto.org/2007/12/17/improved-pluralizing-in-php-actionscript-and-ror/
 * who took the pluralize from
 * http://www.eval.ca/articles/php-pluralize
 *
 * @author Ivan Groosny <igrosny@gmail.com>
 * @version 1.0
 * @package activerecord
 */
class ActiveRecord
{
	protected $has_many = array();
	protected $has_one = array();
	protected $belongs_to = array();
	protected $has_and_belongs_to_many = array();
	protected $configurable = array();
	protected $act_as_tree = 0;
	protected $extended_table = "";
	protected $counter_cache = "";
	private $magic_getter_prefix = "get_";
	private $magic_setter_prefix = "set_";
	private $error = array();
	public $query = "";	

    static $plural = array(
        '/(quiz)$/i'               => "$1zes",
        '/^(ox)$/i'                => "$1en",
        '/([m|l])ouse$/i'          => "$1ice",
        '/(matr|vert|ind)ix|ex$/i' => "$1ices",
        '/(x|ch|ss|sh)$/i'         => "$1es",
        '/([^aeiouy]|qu)y$/i'      => "$1ies",
        '/(hive)$/i'               => "$1s",
        '/(?:([^f])fe|([lr])f)$/i' => "$1$2ves",
        '/(shea|lea|loa|thie)f$/i' => "$1ves",
        '/sis$/i'                  => "ses",
        '/([ti])um$/i'             => "$1a",
        '/(tomat|potat|ech|her|vet)o$/i'=> "$1oes",
        '/(bu)s$/i'                => "$1ses",
        '/(alias)$/i'              => "$1es",
        '/(octop)us$/i'            => "$1i",
        '/(ax|test)is$/i'          => "$1es",
        '/(us)$/i'                 => "$1es",
        '/s$/i'                    => "s",
        '/$/'                      => "s"
    );

    static $singular = array(
        '/(quiz)zes$/i'             => "$1",
        '/(matr)ices$/i'            => "$1ix",
        '/(vert|ind)ices$/i'        => "$1ex",
        '/^(ox)en$/i'               => "$1",
        '/(alias)es$/i'             => "$1",
        '/(octop|vir)i$/i'          => "$1us",
        '/(cris|ax|test)es$/i'      => "$1is",
        '/(shoe)s$/i'               => "$1",
        '/(o)es$/i'                 => "$1",
        '/(bus)es$/i'               => "$1",
        '/([m|l])ice$/i'            => "$1ouse",
        '/(x|ch|ss|sh)es$/i'        => "$1",
        '/(m)ovies$/i'              => "$1ovie",
        '/(s)eries$/i'              => "$1eries",
        '/([^aeiouy]|qu)ies$/i'     => "$1y",
        '/([lr])ves$/i'             => "$1f",
        '/(tive)s$/i'               => "$1",
        '/(hive)s$/i'               => "$1",
        '/(li|wi|kni)ves$/i'        => "$1fe",
        '/(shea|loa|lea|thie)ves$/i'=> "$1f",
        '/(^analy)ses$/i'           => "$1sis",
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i'  => "$1$2sis",
        '/([ti])a$/i'               => "$1um",
        '/(n)ews$/i'                => "$1ews",
        '/(h|bl)ouses$/i'           => "$1ouse",
        '/(corpse)s$/i'             => "$1",
        '/(us)es$/i'                => "$1",
        '/s$/i'                     => ""
    );

    static $irregular = array(
        'move'   => 'moves',
        'foot'   => 'feet',
        'goose'  => 'geese',
        'sex'    => 'sexes',
        'child'  => 'children',
        'man'    => 'men',
        'tooth'  => 'teeth',
        'person' => 'people'
    );

    static $uncountable = array(
        'sheep',
        'fish',
        'deer',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment'
    );	

	public static function new_instance($type)
	{
		return new $type;
	}


	/**
	 * 	The constructor function, it accepts and associative array and converts it into class attributes
	 *  @param hash $args The associative array
	 * 	@return void
	 */
	public function __construct($args = array())
	{
		if(count($args))
		{
			foreach(array_keys($args) as $key)
			{
				$this->$key = $args[$key];
			}
		}
	}

	/**
	 * 	The find function return all the objects that where found
	 *  @param string|integer $args string with query, or the id
	 * 	@return object[] | object | boolean
	 */	
	public function find($args = 0)
	{
		$class_name = $this->get_table();
		$query = "SELECT * FROM ".strtolower($class_name);

		
		if($args)
		{
			$query .= " WHERE ";
			if(is_numeric($args))
			{
				$query .= " $class_name.id=".$args;

				$this->query = $query;
				$result = @mysql_query($query);
				if(!mysql_error())
				{
					if(mysql_num_rows($result))
					{
						$this->__construct(mysql_fetch_assoc($result));
						return $this;
					}
					else
					{
						$this->error = "There is no ".$this->singularize($class_name)." with id= ".$args;
						return false;					
					}
				}
				else
				{
					$this->error = "Error while exceuting the query: ".mysql_error();
					return false;
				}
			}
			elseif(strtolower($args) == 'all')
			{
				$query .= '1=1';

				if($this->act_as_tree)
					$query .= " AND $class_name.parent_id=".$this->id;
					
				//echo $query;
				$result = @mysql_query($query);
				if(!mysql_error())
				{
					$group = new Group($result, get_class($this));
					/*$array_result = array();
					$name = get_class($this);
					if(mysql_num_rows($result))
					{
						while($row = mysql_fetch_assoc($result))
							$array_result[] = new $name($row);
					}
					return $array_result;
					*/
					return $group;
					
				}
				else
				{
					$this->error = "Error while exceuting the query: ".mysql_error();
					return false;
				}					
			}
			else
			{
// 				if($this->extended_table)
// 					$query .= " type='".get_class($this)."' AND ";

				$query .= $args;

				$this->query = $query;
				//echo $this->query;
				$result = @mysql_query($query);
				if(!mysql_error())
				{	
					$group = new Group($result, get_class($this));

					return $group;		
			/*		$array_result = array();
					$name = get_class($this);
					if(mysql_num_rows($result))
						while($row = mysql_fetch_assoc($result))
							$array_result[] = new $name($row);
						
					return $array_result;*/
				}
				else
				{
					$this->error = "Error while exceuting the query: ".mysql_error();
					return false;
				}					
			}
		}
	}

	/**
	 * When you want to find something with an specific sql query
	 * @param String $query
	 */
	public function find_by_sql($query)
	{
		$result = @mysql_query($query);
		if(!mysql_error())
		{	
			$group = new Group($result, get_class($this));
			return $group;	

				/*$array_result = array();
				$name = get_class($this);
				while($row = mysql_fetch_assoc($result))
					$array_result[] = new $name($row);
				return $array_result;*/
		}
		else
		{
			$this->error = "Error while exceuting the query: ".mysql_error();
			return false;
		}	
	}

	/**
	 * 	The save function creates a new object
	 *
	 * 	@return boolean
	 */	
	public function save()
	{
		$class_name = $this->get_table();
		$query = 'SHOW COLUMNS FROM '.strtolower($class_name);
		$result = @mysql_query($query);
		if(mysql_error())
		{
			$this->error = "Error while trying to get the columns: ".mysql_error();
			return false;
		}
		$query_start = 'INSERT INTO '.strtolower($class_name).' (';
		$coma = "";
		$query_end = ') VALUES (';
		while($column = mysql_fetch_assoc($result))
		{
			if($column['Field'] == 'id' && $this->id == "")
			{
				continue;
			}
			if($column['Field'] != 'ids')
			{
				$query_start .= $coma."`".$column['Field'].'`';
				if(isset($this->$column['Field']))
					$value = $this->$column['Field'];
				else
				{
					switch($column['Field'])
					{
						case 'created_on':
							$this->created_on = date('Y-m-d');
							$value = $this->created_on;							
						break;
						case 'updated_on':
							$this->updated_on = date('Y-m-d');
							$value = $this->updated_on;							
						break;
						case 'created_at':
							$this->created_at = date('Y-m-d H:i:s');
							$value = $this->created_at;
						break;
						case 'updated_at':
							$this->updated_at = date('Y-m-d H:i:s');
							$value = $this->updated_at;
						break;												
						default:
							$value = $column['Default'];
					}
				}
				$query_end .= $coma."'".mysql_real_escape_string($value)."'";
				$coma = ", ";
			}
		}
		$query_end .= ')';
		
		$result = @mysql_query ($query_start.$query_end);
	//	echo $query_start.$query_end;
		if(mysql_error())
		{
			$this->error = "Error while trying to save: ".mysql_error();
			return false;
		}
		
		$this->id = mysql_insert_id();
		
		if($this->counter_cache!="")
		{
			$valor = $this->singulize($this->counter_cache[0])."_id";
			$query = "update ".$this->counter_cache[0]." set ".$class_name."_count=".$class_name."_count+1 where id=".$this->$valor;
			$result = @mysql_query($query);
			if(mysql_error())
			{
				$this->error = "Error while trying to increment the cache: ".mysql_error();
				return false;
			}
			
		}
		
		return true;
	}


	/**
	 * 	The save function update an object
	 *
	 * 	@return boolean
	 */	
	public function update()
	{
		$class_name = $this->get_table();
		$query = 'SHOW COLUMNS FROM '.$class_name;
		$result = @mysql_query($query);
		if(mysql_error())
		{
			$this->error = "Error while trying to get the columns: ".mysql_error();
			return false;
		}		
		$query_start = 'UPDATE '.strtolower($class_name).' SET ';
		$coma = "";
		while($column = mysql_fetch_assoc($result))
		{
			if($column['Field'] != 'id')
			{
				if($this->$column['Field'])
				{
					switch($column['Field'])
					{
						case 'updated_on':
							$this->updated_on = date('Y-m-d');
							$value = $this->updated_on;							
						break;
						case 'updated_at':
							$this->updated_at = date('Y-m-d H:i:s');
							$value = $this->updated_at;
						break;												
						default:
							$value = $this->$column['Field'];
					}
				}	
				else
				{
							$value = $column['Default'];							
				}
				$query_start .= $coma.'`'.$column['Field'].'`'."='".mysql_real_escape_string($value)."'";
				$coma = ", ";
			}
		}
		$query_start .= ' WHERE id='.$this->id;

		$result = @mysql_query ($query_start);
		//echo $query_start;
		
		if(mysql_error())
		{
			$this->error = "Error while trying to save: ".mysql_error();
			return false;
		}	
		
		return true;
	}

	/**
	 * 	The save function destroys an object
	 *
	 * 	@return boolean
	 */	
	public function destroy()
	{
		$class_name = $this->get_table();	
		
		if($this->counter_cache!="")
		{
			$valor = $this->singulize($this->counter_cache[0])."_id";
			$query = "update ".$this->counter_cache[0]." set ".$class_name."_count=".$class_name."_count-1 where id=".$this->$valor;
			$result = @mysql_query($query);
			if(mysql_error())
			{
				$this->error = "Error while decrementing chache counter: ".mysql_error();
				return false;
			}

		}
			
		$query = 'DELETE FROM '.strtolower($class_name);
		$query .= ' WHERE id='.$this->id;

		$result = @mysql_query ($query);
		if(mysql_error())
		{
			$this->error = "Error while trying to save: ".mysql_error();
			return false;
		}
		return true;

	}

	public function __get($args)
	{
		//	echo strtolower($this->singulize($this->get_table()))."_id=".$this->id.$other_type;
		
		if (in_array($args, $this->has_many))
		{
			$objeto = self::new_instance($this->singulize($args));

			$other_type = "";
			if($objeto->extended_table!="")
				$other_type = " AND type='".get_class($objeto)."'";
				
			$this->$args= $objeto->find(strtolower($this->singulize($this->get_table()))."_id=".$this->id.$other_type);
		//	echo strtolower($this->singulize($this->get_table()))."_id=".$this->id.$other_type;
			if($objeto->has_errors())
				return false;
			return $this->$args;
		}
		elseif (in_array($args, $this->has_and_belongs_to_many))
		{
			$objeto = self::new_instance($this->singulize($args));
			$left_table = strtolower($args);
			$right_table = strtolower($this->pluralize(get_class($this)));
			$this->$args= $objeto->find_by_sql('SELECT table1.* FROM '.$left_table.' AS table1 LEFT JOIN '.$this->many_to_many($left_table, $right_table).' AS table2 ON table1.id=table2.'.$this->singulize($left_table).'_id WHERE table2.'.$this->singulize($right_table).'_id='.$this->id);
			return $this->$args;
		}
		elseif (in_array($args, $this->has_one))
		{
			//echo "asdfasdf";
			$objeto = self::new_instance($args);
			//$left_table = strtolower($this->pluralize($args));
			$right_table = strtolower(get_class($this));
			$list = $objeto->find($right_table.'_id='.$this->id);

			if(count($list)){
			$this->$args = $list->current();
			
			return $this->$args;
			}else{
				return false;
			}
		}		
		elseif (in_array($args, $this->belongs_to))
		{
			$objeto = self::new_instance($args);
			$value = strtolower($args)."_id";
			$this->$args= $objeto->find($this->$value);
		
			return $this->$args;
		}
		elseif (method_exists($this,$this->magic_getter_prefix.$args))
		{
			$call = $this->magic_getter_prefix.$args; 
			return $this->$call ();
		}
		elseif (substr($args,0,5)=="html_")
		{
			$var = substr($args,5);
			$value = htmlspecialchars($this->$var);
			$value = str_replace('\r\n',"<br />",$value);
			$value = nl2br($value);
			$value = stripslashes($value);
			return $value;
		}
		
	}

	public function __set($arg,$value)
    {
		if (method_exists($this,$this->magic_setter_prefix.$arg))
    	{
			$call = $this->magic_setter_prefix.$arg; 
			return $this->$call ($value);
		}
    	else
    	{
			$this->$arg = $value;
		}	
	}

	private function many_to_many($left_table, $right_table)
	{
		if (strcmp($left_table, $right_table) < 0)
			return $left_table."_".$right_table;
		else
			return $right_table."_".$left_table;
	}

    public static function pluralize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular singular forms
        foreach ( self::$irregular as $pattern => $result )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$plural as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }

    public static function singularize( $string )
    {
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), self::$uncountable ) )
            return $string;

        // check for irregular plural forms
        foreach ( self::$irregular as $result => $pattern )
        {
            $pattern = '/' . $pattern . '$/i';

            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string);
        }

        // check for matches using regular expressions
        foreach ( self::$singular as $pattern => $result )
        {
            if ( preg_match( $pattern, $string ) )
                return preg_replace( $pattern, $result, $string );
        }

        return $string;
    }


	public static function singulize($str)
	{
		if(substr($str,-3) == "ies")
			$str = substr($str,0,-3)."y";
		elseif(strtolower($str) == "filesystem")
			$str = "filesystem";
		elseif(strtolower($str) == "children")
			$str = "child";			
		else
			$str = self::singularize($str);//  substr($str,0,-1);
		return $str;
	}
	
	private function get_table()
	{
		if($this->extended_table)
		{
			return strtolower($this->extended_table);
		}
		else
		{
			return strtolower($this->pluralize(get_class($this)));
		}
	}
	
	
	function set_error($param){
		$this->error[] = $param; 
	}
	
	function get_error(){
		return $this->error;
	}
	
	function has_errors(){
		if(count($this->error))
			return true;
		else
			return false;
	}
	
	function __wakeup(){
		foreach($this->has_many as $has){
			unset($this->$has);
		}
		//self::__sleep();
	}
}
?>