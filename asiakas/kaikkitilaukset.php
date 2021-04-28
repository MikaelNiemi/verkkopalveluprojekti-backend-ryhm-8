<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

try {
    $db = openDb();
    selectAsJson($db,"SELECT asnro, tilausrivi.tilausnro, rivinro, tilausrivi.tuotenro, tuotenimi, kpl, tapa, tila, tilauspvm
                        FROM tilaus, tilausrivi, tuote
                        WHERE tilaus.tilausnro = tilausrivi.tilausnro AND tilausrivi.tuotenro = tuote.tuotenro");
   
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}