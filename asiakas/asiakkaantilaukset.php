<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$asnro=filter_input(INPUT_POST,"asnro",FILTER_SANITIZE_NUMBER_INT);

try {
    $db = openDb();
    selectAsJson($db,"SELECT tilausrivi.tilausnro, tuotenimi, tilausrivi.kpl, SUM(kpl*hinta) AS 'Summa'
                        FROM tilaus, tilausrivi,tuote
                        WHERE tilaus.tilausnro = tilausrivi.tilausnro AND tilausrivi.tuotenro = tuote.tuotenro AND asnro='$asnro'
                        GROUP BY tilausnro, tuotenimi");
   
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
