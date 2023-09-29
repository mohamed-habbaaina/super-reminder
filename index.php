<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';


$router = new AltoRouter();


$router->setBasePath('/B2/super-reminder');

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\RegisterUserController;

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

$router->map( 'POST', '/register', function() {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $login = $_POST['email'];
    $password = $_POST['password'];
    $rePass = $_POST['rePass'];

    $registerUserController = new RegisterUserController();
    $registerUserController->registerUser($firstname, $lastname, $login, $password, $rePass);
}, 'register-user' );



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
