<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 8:44 AM
 */
function dbConn()
{
    $dsn = "mysql:host=localhost;dbname=phpclassfall2017";
    $username = "phpclassfall2017";
    $password = "se266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("The was problem connecting to the db.");
    }
}