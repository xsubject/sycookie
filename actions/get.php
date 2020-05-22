<?php 
require_once '_action.php';

class GetAction extends BaseAction {
	public $required = ['key'];

	public function execute() {
		
		return "get action executed: ". $this->request['key'];
	}
}