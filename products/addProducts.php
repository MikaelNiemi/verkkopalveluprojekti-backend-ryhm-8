<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$tuotenimi = filter_input(INPUT_POST,"tuotenimi",FILTER_SANITIZE_STRING);
$hinta = filter_input(INPUT_POST,"hinta",FILTER_SANITIZE_STRING);
$image = filter_input(INPUT_POST,"image",FILTER_SANITIZE_STRING);
$kuvaus = filter_input(INPUT_POST,"kuvaus",FILTER_SANITIZE_STRING);
$trnro = filter_input(INPUT_POST,"trnro",FILTER_SANITIZE_NUMBER_INT);

try {
    $db = openDb();

    $post = $db->prepare("INSERT INTO tuote(tuotenimi, hinta, image, kuvaus, trnro)
    VALUES(:tuotenimi, :hinta, :image, :kuvaus, :trnro)");

    $post->bindValue(':tuotenimi', $tuotenimi, PDO::PARAM_STR);
    $post->bindValue(':hinta', $hinta, PDO::PARAM_STR);
    $post->bindValue(':image', $image, PDO::PARAM_STR);
    $post->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
    $post->bindValue(':trnro', $trnro, PDO::PARAM_INT);
    $post->execute();

    $newId = $db->lastInsertId();
    header("Location: http://localhost:3000/LisaaTuote");
} catch (PDOException $pdoex) {
    returnError($pdoex);
}