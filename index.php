<?php
include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_classes/Autoloader.php';
// require_once 'vendor/filp/whoops/src/Whoops/Run.php';
require_once '_classes/Router.php';

$autoload = new Autoloader();
$autoload->registerClass();
$autoload->registerModels();
$autoload->registerViews();

$request = $_GET['page'];
// debug($request);
// debug(CLASSES);
// include_once CONFIG.'config.php';
// include_once FUNCTIONS.'functions.php';
// include_once CLASSES.'Autoloader.php';

// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();

$router = new Router();
$router->routeReq();
// debug(ROOT);
// debug(CONTROLLER);

// debug($router);
// debug($autoload);
// debug($_SERVER);
// debug($_SERVER['PHP_SELF']);
// debug($_SERVER['HTTP_HOST']);
// debug($_GET['page']);

// debug(URL);




// debug($_GET['pg']);

// if(isset($_GET['pg']) AND $_GET['pg'] === '1'){

//     $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
//     http_response_code(301);
//     header('Location: ' . $uri);

//     // debug($uri);
//     // debug($_SERVER);
//     // $page = trim(strtolower($_GET['page']));
// } 