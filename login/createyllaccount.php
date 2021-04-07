<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
$sukunimi = filter_input(INPUT_POST,"sukunimi",FILTER_SANITIZE_STRING);
$etunimi = filter_input(INPUT_POST,"etunimi",FILTER_SANITIZE_STRING);
$salasana = filter_input(INPUT_POST,"salasana",FILTER_SANITIZE_STRING);
$salasanahash = hash("sha256", $salasana);

try {
    $db = openDb();
    $post = $db->prepare("INSERT INTO yllapitaja(sukunimi, etunimi, email, salasana) 
    VALUES(:sukunimi, :etunimi, :email, :salasana)");
    $post->bindValue(':sukunimi', $sukunimi, PDO::PARAM_STR);
    $post->bindValue(':etunimi', $etunimi, PDO::PARAM_STR);
    $post->bindValue(':email', $email, PDO::PARAM_STR);
    $post->bindValue(':salasana', $salasana, PDO::PARAM_STR);
    $post->execute();
    
} catch (PDOException $pdoex) {
    returnError($pdoex);
}