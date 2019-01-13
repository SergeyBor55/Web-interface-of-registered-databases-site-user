<?php
ini_set('display_errors', 1);

session_start();

//Autoloading classes
require_once 'core/components/Autoload.php';

spl_autoload_register('my_autoloader');

//Calling the router
$router = new Router();
$router->run();