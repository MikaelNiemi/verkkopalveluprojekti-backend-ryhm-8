<?php
require_once '../inc/headers.php';
require_once '../inc/functions.php';

$trnimi = filter_input(INPUT_POST,'trnimi',FILTER_SANITIZE_STRING);

try {
    $db = openDb();

    $post = $db->prepare("INSERT INTO tuoteryhma(trnimi) VALUES(:trnimi)");
    $post->bindValue(':trnimi', $trnimi, PDO::PARAM_STR);
    $post->execute();

    $newId = $db->lastInsertId();
} catch (PDOException $pdoex) {
    returnError($pdoex);
}