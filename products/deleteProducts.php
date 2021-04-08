<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$input = json_decode(file_get_contents('php://input'));
$tuotenro = filter_var($input->tuotenro,FILTER_SANITIZE_NUMBER_INT);

try {
    // Ylläpitosivulla poistetaan tuote
    $db = openDb();
    $query = $db->prepare('delete from tuote where tuotenro=:tuotenro');
    $query->bindValue(':tuotenro',$tuotenro,PDO::PARAM_INT);
    $query->execute();
    
    header('HTTP/1.1 200 OK');
    $data = array('tuotenro' => $tuotenro);
    echo json_encode($data);
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
