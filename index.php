<?php 
require_once 'sycookie.php';

$settings = file_get_contents('settings.json');
$settings = json_decode($settings);

$sycookie = new SyCookie($settings->net, $settings->cookie_name);
