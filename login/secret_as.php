<?php
session_start();
require_once '../inc/headers.php';
require_once '../inc/functions.php';

if (!isset($_SESSION['asiakas'])) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}
header('HTTP/1.1 200 OK');
$data = array('message' => "Asiakas kirjautunut.");
echo json_encode($data);
  