<?php
	class Bootstrap
	{
		public static $db;
		public $url;
		public $controller;

		public function __construct() {
			$this->requiresAllFiles();
			$this->getURL();
			var_dump($ur);
		}

		public function requiresAllFiles() {
			$this->_config = include 'config.php';			
			self::$db = $this->_config['DB'];
			include 'libs/Database.php';
		}

		public function loadController() {
	        include 'Controller.php';
	        $this->controller = new Controller;
	    }

		public function loadModel() {
	        require 'Model.php';
	        $this->model = new Model;
	    }

	    public function loadMethods($param = false) {
	        if (method_exists($this->controller, $this->url[1])) {
	            if($param == true){
	                $this->controller->{$this->url[1]}($this->url[2]);
	            } else {
	                $this->controller->{$this->url[1]}();
	            }
	        } else {
	            throw new Exception('Method ' . $this->url[1]. ' not found!!');
	        }
	    }

	    

	    public function getURL()
	    {
	        $url = isset($_GET['url']) ? $_GET['url'] : null;
	        $url = rtrim($url, '/');
	        $url = filter_var($url, FILTER_SANITIZE_URL);
	        $url = explode('/', $url);
	        $this->url = $url;
	    }

	    public function loadIndexMethod()
	    {
	        $this->controller->index();
	    }

	    public function bootstrapping()
	    {
	        if (empty($this->url[1])) {
	            $this->loadIndexMethod();
	            return false;
	        }

	        if(isset($this->url[2])) {
	            $this->loadMethods(true);
	        } else {
	            if(isset($this->url[1])) {
	                $this->loadMethods();
	            } else {
	                $this->loadIndexMethod();
	            }
	        }
	    }

	}
?>