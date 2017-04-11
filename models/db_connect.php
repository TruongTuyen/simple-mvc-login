<?php

$conn = mysqli_connect( 'localhost', 'root', '', 'simple_mvc' ) or die( 'Could not connect to server' );
mysqli_set_charset( $conn, 'utf8' );