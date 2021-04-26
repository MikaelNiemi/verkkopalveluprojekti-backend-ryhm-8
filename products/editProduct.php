<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$tuotenro = $parameters[1];

$tuotenimi=filter_input(INPUT_POST,'tuotenimi',FILTER_SANITIZE_STRING);
$hinta=filter_input(INPUT_POST,'hinta',FILTER_SANITIZE_STRING);
$kuvaus=filter_input(INPUT_POST,'kuvaus',FILTER_SANITIZE_STRING);
$trnro=filter_input(INPUT_POST,'trnro',FILTER_SANITIZE_NUMBER_INT);

if (isset($_FILES['file'])) {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
      $filename = $_FILES['file']['name'];
      $type = $_FILES['file']['type'];
  
      if ($type === 'image/png')  {
        $path = '../img/' . basename($filename);
        if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
            $db = openDb();
            $db->beginTransaction();
            $kysely = $db->prepare("UPDATE tuote SET tuotenimi='$tuotenimi', hinta='$hinta', kuvaus='$kuvaus', trnro = '$trnro', image = '$filename' WHERE tuotenro = $tuotenro");
            $kysely->execute();
            $db->commit();
        } else {
            returnError("Tiedoston tallentaminen img-kansioon epäonnistui");
        }
    } else {
        returnError("Kuvan tyyppi virheellinen");
    }
} else {
    returnError("Kuvaa ei voitu ladata selaimelta");
}
} else {
    $db = openDb();
    
    $kysely = $db->prepare("UPDATE tuote SET tuotenimi = :tuotenimi, hinta = :hinta, kuvaus = :kuvaus, trnro = :trnro WHERE tuotenro = :tuotenro");
    
    $kysely->bindValue(':tuotenro',$tuotenro,PDO::PARAM_INT);
    $kysely->bindValue(':tuotenimi',$tuotenimi,PDO::PARAM_STR);
    $kysely->bindValue(':hinta',$hinta,PDO::PARAM_STR);
    $kysely->bindValue(':kuvaus',$kuvaus,PDO::PARAM_STR);
    $kysely->bindValue(':trnro',$trnro,PDO::PARAM_INT);
    $kysely->execute();
}