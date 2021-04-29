<?php
  require_once '../inc/functions.php';
  require_once '../inc/headers.php'; 

  $etunimi = filter_input(INPUT_POST,"etunimi",FILTER_SANITIZE_STRING);
  $sukunimi = filter_input(INPUT_POST,"sukunimi",FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_STRING);
  $salasana = filter_input(INPUT_POST,"salasana", FILTER_SANITIZE_STRING);
  $postinro = filter_input(INPUT_POST, "postinro", FILTER_SANITIZE_NUMBER_INT);
  $lahiosoite = filter_input(INPUT_POST, "lahiosoite", FILTER_SANITIZE_STRING);
  $salasanahash=hash("sha256", $salasana);
  //$salasana = $salasanahash;
  //$salasana2 = filter_input(INPUT_POST, "salasana2", FILTER_SANITIZE_STRING);
 
      try {
      
        $db = openDb();
        selectAsJson($db," INSERT INTO asiakas (sukunimi,etunimi,email,salasana,postinro,lahiosoite) VALUES ('$sukunimi','$etunimi','$email','$salasanahash','$postinro','$lahiosoite')");

      } catch (PDOException $pdoex) {
          returnError($pdoex);
}
      