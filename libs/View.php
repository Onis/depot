<?php
	class View 
	{
		public function __construct() {}

		/*
			
		*/		
		public function render($name) {
	        $path = 'views/' . $name. '.php';
	        include 'views/default/header.php';
	        include $path;
	        include 'views/default/footer.php';
		}
	}
?>