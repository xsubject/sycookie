<?php 
require_once '_action.php';

class PutAction extends BaseAction {
	public $required = ['key', 'value'];

	public function execute() {
		$key = $this->request['key'];
		$value = $this->request['value'];

		$filepath = generate_filepath($key, $this->caller->net);

		file_put_contents($filepath, $value);
	}
}