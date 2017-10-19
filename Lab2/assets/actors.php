<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 8:55 AM
 */
function getActorsAsTable($db) {
    try {
        $sql = "SELECT * FROM actors";
        $sql = $db->prepare($sql);
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($actors as $actor) {
                $table .= "<td><td>" . $actor['firstname'] . "</td><td>" . $actor['lastname'] . "</td><td>" . $actor['dob'] . "</td><td>" . $actor['height'] . "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No Actors.". PHP_EOL;
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem getting the actors");
    }
}
function addActor($db, $firstname, $lastname, $dob, $height) {
    try {
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("The was problem adding the actor.");
    }
}