<?php

use App\Controllers\HomeController;

require 'vendor/autoload.php';

require 'AltoRouter.php';

$router = new AltoRouter();


$router->setBasePath('/B2/super-reminder');

$router->map( 'GET', '/', function() { 
       $homeController =  new HomeController();
       $homeController->showHome();
}, 'home' );









// match current request url
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}











?>
