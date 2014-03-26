<?php
class App{

	private $appPath;

	public function __construct($aPath){

		$this->appPath = $aPath;
	}

	private function dispach(){

		$pathInfo = explode("/", $_SERVER['PATH_INFO']);

		$controllerPath = $this->appPath."/Controller";

		$controllerName = $pathInfo[1]."Controller";

		$controllerFunction = $pathInfo[2];
		$controller = $controllerPath."/".$pathInfo[1]."Controller.class.php";
		
		if(is_file($controller)){
			include_once("Controller.class.php");
			include_once($controller);
			
			$controllerObj = new $controllerName();
			$controllerObj->$controllerFunction();
		}else{
			throw new Exception("不是文件!", 1);
			
		}
	}

	public function run(){

		$this->dispach();

	}
}