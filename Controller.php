<?php
	class Controller
	{
		function __construct() {
			$this->view = View;

	    }

	    

	    public function index() {
	    	$this->render('index');
	    }

	    public function select() {

	    }

	    public function loadModel()
	    {
	        require 'Model.php';
	        $this->model = new Model;
	    }

	    public function loadMethods($param = false)
	    {
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

	    public function loadController($controller)
	    {
	        $path = 'modules/' . ModuleManager::$module . '/controllers/' . $controller . 'Controller.php';
	        if (file_exists($path)) {
	            include $path;
	            $controllerName = $controller . 'Controller';
	            $this->controller = new $controllerName;
	        } else {
	            throw new Exception('Incorrect file directory: '.$path.'. Controller not load!!');
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

	}
?>