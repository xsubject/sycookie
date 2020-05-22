<?php 
require_once '_action.php';

class GetAction extends BaseAction {
	public function execute() {
		$cn = $this->caller->cookie_name;

		if (!isset($_COOKIE[$cn])) {
			$val = generate_value(VAL_SRC_LEN);
			setcookie($cn, $val, time()+3600*24*365);
			return array('val' => $val, 'key' => $cn);
		}

		return array('val' => $_COOKIE[$cn], 'key' => $cn);
	}
}