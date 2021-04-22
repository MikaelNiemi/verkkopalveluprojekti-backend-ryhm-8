<?php
require_once '../inc/headers.php';
require_once '../inc/functions.php';

// $picture = filter_input(INPUT_POST,'picture',FILTER_SANITIZE_STRING);
$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$tuotenro = $parameters[1];

if (isset($_FILES['file'])) {
  if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $filename = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];

    if ($type === 'image/png')  {
      $path = '../img/' . basename($filename);

      if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
          $db = openDb();
          $db->beginTransaction();
          $kysely = $db->prepare("UPDATE tuote SET image = '$filename' WHERE tuotenro = $tuotenro");
          $kysely->execute();
          $db->commit();
      } 
    }
  } 
} 
