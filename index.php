<?php 
require_once 'sycookie.php';
require_once 'tools.php';

require_once './actions/get.php';
require_once './actions/put.php';

define('VAL_SRC_LEN', 128);

$settings = file_get_contents('settings.json');
$settings = json_decode($settings);
$sycookie = new SyCookie($settings->net, $settings->cookie_name);
$sycookie->add_route("get", new GetAction());
$sycookie->add_route("put", new PutAction());
$sycookie->routing();