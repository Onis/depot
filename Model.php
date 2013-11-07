<?php

	class Model
	{
		public function __construct() {
			$db = Bootstrap::$db;
			DB::connect($db['host'], $db['user'], $db['pass'], $db['dbname'], $db['charset']);
		}

		
	}

?>