<?php
 $server = 'localhost';
 $username='root';
 $pass = '';
 $db = 'issuestracker';
 $con = new mysqli($server , $username , $pass ,$db);
 if($con->connect_error)
 {
    die( 'connection failed'.$conn->connect_error);
 }

?>