<?php session_start();

$controller = 'user';
$action  = 'user_login';

define ( 'SIMPLE_MVC_PATH', dirname( __FILE__ ) );
define ( 'SIMPLE_MVC_URL', 'http://localhost/simple_mvc/' );


if( isset( $_GET['controller'] ) && $_GET['controller'] != '' ){
    $controller = htmlentities( trim( $_GET['controller'] ) );
}

if( isset( $_GET['action'] ) && $_GET['action'] != '' ){
    $action = htmlentities( trim( $_GET['action'] ) );
}

if( $controller != '' ){
    $controller_file =  SIMPLE_MVC_PATH . '/controllers/' . $controller . '.php';
    $model_file =  SIMPLE_MVC_PATH . '/models/' . $controller . '.php';
    
    if( file_exists( $model_file ) ){
        require_once $model_file;
    }
    
    if( file_exists( $controller_file ) ){
        require_once $controller_file;
    }
    
    if( function_exists( $action ) ){
        $action();
    }
}


