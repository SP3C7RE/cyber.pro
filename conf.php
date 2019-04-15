<?php
/**
 * Created by PhpStorm.
 * User: Kiril Andonov
 * Date: 11.12.17
 * Time: 19:13
 */

// Make connection to database
$con = mysqli_connect('127.0.0.1','root','','cyberfx');

//Throw exception if there is no connection
if(!$con){
    echo 'No connection with database, check your configuration';
}
