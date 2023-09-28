<?php


require 'vendor/autoload.php';


$router = new AltoRouter();


$router->setBasePath('/B2/super-reminder');

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;

//homepage route
$router->map( 'GET', '/', function() { 
       $homeController =  new HomeController();
       $homeController->showHome();
}, 'home' );

//registerPage route

$router->map( 'GET', '/register', function() { 
    $registerController = new RegisterController;
    $registerController->showRegister();
}, 'register' );

//loginPage route

$router->map( 'GET' , '/login' , function() {
    $loginController = new LoginController();
    $loginController->showLogin();
},'login');





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
