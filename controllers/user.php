<?php

if( !function_exists( 'user_login' ) ){
    function user_login(){
        if( isset( $_SESSION['user_logged_in'] ) && $_SESSION['user_logged_in'] ){
            $link = 'index.php?controller=user&action=user_logged_in';
            header( "location: $link" );
            die;
        }else{
            user_load_view( 'login' );
        }
        
    }
}

if( !function_exists( 'user_logged_in' ) ){
    function user_logged_in(){
        user_load_view( 'user_logged_in' );
    }
}

if( !function_exists( 'user_check_login' ) ){
    function user_check_login(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            $error = array();
            if( isset( $_POST['username'] ) && $_POST['username'] != '' ){
                $user_name = htmlentities( $_POST['username'] );
            }else{
                $error[] = '<p>Please enter username</p>';
            }
            
            if( isset( $_POST['password'] ) && $_POST['password'] != '' ){
                $password = md5( htmlentities( $_POST['password'] ) );
            }else{
                $error[] = '<p>Please enter password</p>';
            }
            
            if( empty( $error ) ){
                //Input valid, check username in db
                if( model_user_check_user( $user_name, $password ) ){
                    $_SESSION['user_logged_in'] = true;
                    $link = 'index.php?controller=user&action=user_logged_in';
                }else{
                    $message = 'Wrong username or password';
                    $link = 'index.php?controller=user&action=user_login&message=' . $message;
                }
                header( "location: $link" );
                die;
                
            }else{
                $link = 'index.php?controller=user&action=user_login&message='.implode( '', $error );
                header( "location: $link" );
                die;
            }
        }else{
            $link = 'index.php?controller=user&action=user_login';
            header( "location: $link" );
            die;
        }
        
    }
}

if( !function_exists( 'user_logout_link' ) ){
    function user_logout_link(){
        unset( $_SESSION['user_logged_in'] );
        session_destroy();
        
        $link = 'index.php?controller=user&action=user_login';
        header( "location: $link" );
        die;
    }
}

if( !function_exists( 'user_load_view' ) ){
    function user_load_view( $view_name ){
        $view_file = SIMPLE_MVC_PATH . '/views/user/' . $view_name . '.php';
        if( file_exists( $view_file ) ){
            include $view_file;
        }
    }
}
