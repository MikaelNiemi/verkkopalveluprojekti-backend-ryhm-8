<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
$salasana=filter_input(INPUT_POST,"salasana",FILTER_SANITIZE_STRING);
$salasanahash=hash("sha256", $salasana);

$sql = "SELECT * FROM asiakas WHERE email = '$email'";

 try {
     $db = openDb();
     $query = $db->query($sql);
     $asiakas = $query->fetch(PDO::FETCH_OBJ);
     if ($asiakas) {
        $salasanaDb = $asiakas->salasana;
        if ($salasanahash === $salasanaDb) {
            header('HTTP/1.1 200 OK');
            $data = array(
                'sukunimi' => $asiakas->sukunimi,
                'etunimi' => $asiakas->etunimi,
                'asnro' => $asiakas->asnro,
            );
            $_SESSION['asiakas'] = $asiakas;
        } else {
            header('HTTP/1.1 401 Unauthorized');
            $data = array('message' => "Virhe1");
        }
    } else {
        header('HTTP/1.1 401 Unauthorized');
        $data = array('message' => "Virhe2");
    }
     echo json_encode($data);
 } catch (PDOException $pdoex) {
     returnError($pdoex);
 }