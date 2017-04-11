<?php
require_once 'db_connect.php';

if( !function_exists( 'model_user_check_user' ) ){
    function model_user_check_user( $user_name, $password ){
        global $conn;
        $sql = "SELECT * FROM user WHERE username='{$user_name}' AND password='{$password}'";
        $query = mysqli_query( $conn, $sql );
        
        if( mysqli_num_rows( $query ) > 0 ){
            return true;
        }
        return false;
    }
}