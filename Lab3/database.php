<?php
{
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
}

