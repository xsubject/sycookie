<?php

class BaseAction {
	public $caller;
	public $request;
	public $required = [];

	public function execute() {
		throw new Exception("execute method not implemented", 1);
	}
}