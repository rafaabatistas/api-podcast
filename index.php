<?php 

  $path = explode("/", $_GET['path']);
  $contents = file_get_contents('server.json');

  $json = json_decode($contents, true);

  $method = $_SERVER['REQUEST_METHOD'];

  header('Content-Type: application/json');
  $body = file_get_contents('php://input');

  if($method === 'GET') {
    echo json_encode($json);
  } else {
    echo '[]';
  }

?>