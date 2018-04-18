<?php   
	/**
	* 
	*/
	class DB {
		
		public function __construct(){}
		public static function Conn(){
			if (is_null(self::$Conn)){
				self::$Conn = new PDO('mysql:host='.HOST.';dbname='.DB.'',''.USER.'',''.PASS.'');
			}
		return self::Conn;
		}
	}
?>