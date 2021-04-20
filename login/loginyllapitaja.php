<?php
session_start();
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$yll_email = filter_input(INPUT_POST,"yll_email",FILTER_SANITIZE_STRING);
$yll_salasana = filter_input(INPUT_POST,"yll_salasana",FILTER_SANITIZE_STRING);
$salasanahash=hash("sha256", $yll_salasana);

$sql = "SELECT * FROM yllapitaja WHERE email = '$yll_email'";

 try {
     $db = openDb();
     $query = $db->query($sql);
     $yllapito = $query->fetch(PDO::FETCH_OBJ);
     if ($yllapito) {
        $salasanaDb = $yllapito->salasana;
        if ($salasanahash === $salasanaDb) {
            header('HTTP/1.1 200 OK');
            $data = array(
                'sukunimi' => $yllapito->sukunimi,
                'etunimi' => $yllapito->etunimi
            );
            $_SESSION['yllapito'] = $yllapito;
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