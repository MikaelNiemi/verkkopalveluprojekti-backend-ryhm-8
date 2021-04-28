<?php
require_once '../inc/headers.php';
require_once '../inc/functions.php';

$tuotenimi = filter_input(INPUT_POST,"tuotenimi",FILTER_SANITIZE_STRING);
$hinta = filter_input(INPUT_POST,"hinta",FILTER_SANITIZE_STRING);
$kuvaus = filter_input(INPUT_POST,"kuvaus",FILTER_SANITIZE_STRING);
$trnro = filter_input(INPUT_POST,"trnro",FILTER_SANITIZE_NUMBER_INT);

if (isset($_FILES['file'])) {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['file']['name'];
        $type = $_FILES['file']['type'];
        if ($type === 'image/png') {
            $path = "../img/" . basename($filename);
            if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
                $db = openDb();

                $post = $db->prepare("INSERT INTO tuote(tuotenimi, hinta, image, kuvaus, trnro)
                VALUES(:tuotenimi, :hinta, :image, :kuvaus, :trnro)");

                $post->bindValue(':tuotenimi', $tuotenimi, PDO::PARAM_STR);
                $post->bindValue(':hinta', $hinta, PDO::PARAM_STR);
                $post->bindValue(':image', $filename, PDO::PARAM_STR);
                $post->bindValue(':kuvaus', $kuvaus, PDO::PARAM_STR);
                $post->bindValue(':trnro', $trnro, PDO::PARAM_INT);
                $post->execute();

                $newId = $db->lastInsertId();
            } else {
                returnError("Tiedoston tallentaminen img-kansioon epäonnistui");
            }
        } else {
            returnError("Kuvan tyyppi virheellinen");
        }
    } else {
        returnError("Kuvaa ei voitu ladata selaimelta");
    }
}

// header("Location: http://localhost:3000/LisaaTuote");