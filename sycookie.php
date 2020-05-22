<?php 

class SyCookie {
	private $net;
	private $cookie_name;

	function __construct($net, $cookie_name) {
		$this->net = $net;
		$this->cookie_name = $cookie_name;
	}
}