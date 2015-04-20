<?php
header ( 'Content-Type: application/json' );
session_start ();
// ini_set("display_errors", 0);
// echo substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']));
/**
 * Define document paths
 */
define ( 'SERVER_ROOT', dirname ( __FILE__ ) );
require SERVER_ROOT . '/conf.php';
require SERVER_ROOT . '/classes/util/json.php';
$apPath = Config::read('appication_path');
define ( 'SITE_URL', $_SERVER ['HTTP_HOST'] . '/'.($apPath == "" ? "" : trim($apPath,'/').'/') );
$autoloader = new Autoloader ( 'services' );
$request = '';
parse_str ( $_SERVER ['QUERY_STRING'], $request );
$request = $request ['url'];
if (empty ( $request )) {
	$request = 'Home';
}
$request_ar = explode ( '/', $request );
$service = htmlentities ( ucfirst (array_shift($request_ar)) );
if (class_exists ( $service )) {
	$page = new $service ();
} else {
	$json = new Json ();
	$json->error ( 9999, "Sorry no service exists" );
	exit;
}
$service_function = htmlentities ( ucfirst (array_shift($request_ar)) );
if (method_exists ( $page, $service_function )) {
	$page->$service_function ( $request_ar );
} else {
	$json = new Json ();
	$json->error ( 9999, "Sorry no service exists" );
	exit;
}

?>