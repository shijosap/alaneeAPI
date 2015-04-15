<?php
header('Content-Type: application/json');
session_start();
//ini_set("display_errors", 0);
//echo substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT'])); 
/**
 * Define document paths
 */
define('SERVER_ROOT' , dirname(__FILE__));
define('SITE_URL' , $_SERVER['HTTP_HOST'].'/');
require SERVER_ROOT.'/conf.php';
require SERVER_ROOT.'/classes/json.php';
$autoloader = new Autoloader('services');
$request = '';
parse_str($_SERVER['QUERY_STRING'],$request);
$request = $request['url'];
if(empty($request)) {
	$request = 'Home';
}
$request_ar = explode('/',$request);
//echo '<pre>';
//print_r($request_ar); exit;
$service = htmlentities(ucfirst($request_ar[0]));
if (class_exists($service)) {
$page = new $service();
}else{
	$json = new Json();
	$json->error(9999,"Sorry no service exists");
}
unset($request_ar[0]);
$service_function = htmlentities(ucfirst($request_ar[1]));
$page->$service_function($request_ar);

?>