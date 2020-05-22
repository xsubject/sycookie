<?php 
require_once 'errors.php';


class SyCookie {
	public $net;
	public $cookie_name;
	private $routes;

	function __construct($net, $cookie_name) {
		$this->net = $net;
		$this->cookie_name = $cookie_name;
		$this->routes = array();
	}

	function add_route($name, $action) {
		$this->routes[$name] = $action; 
	}

	function routing() {
		$nRoute = $_REQUEST['action'];
		if(!isset($this->routes[$nRoute])) {
			return $this->_response(false, SYCOOKIE_ROUTE_NOT_FOUND);
		}

		foreach ($this->routes[$nRoute]->required as $arg) {
			if(!isset($_REQUEST[$arg])) {
				return $this->_response(false, SYCOOKIE_ARGUMENT_REQUIRED, $arg);
			}
		}

		try{
			$this->routes[$nRoute]->caller = $this;
			$this->routes[$nRoute]->request = $_REQUEST;
			$result = $this->routes[$nRoute]->execute();
		} catch (Exception $e) {
			return $this->response(false, $e->getCode(), $e->getMessage());
		} 

		return $this->_response(true, SYCOOKIE_SUCCESS, $result);
	}

	private function _response($success, $code, $data=none) {
		header('Content-Type: application/json');
		$response = array('success' => $success, 
						'code' => $code, 
						'data' => $data);
		exit(json_encode($response));
	}
}