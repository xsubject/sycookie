<?php 
require_once 'settings.php';
require_once 'sycookie.php';
require_once 'tools.php';

require_once './actions/get.php';
require_once './actions/put.php';

$sycookie = new SyCookie(SETTINGS_NET, SETTINGS_COOKIE_NAME);
$sycookie->add_route("get", new GetAction());
$sycookie->add_route("put", new PutAction());
$sycookie->routing();