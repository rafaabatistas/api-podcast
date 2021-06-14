<?php 

  if(!array_key_exists('path', $_GET)) {
    echo 'Error. Path missing';
    exit();
  }

  $path = explode("/", $_GET['path']);

  if(count($path) === 0 || $path[0] === '') {
    echo 'Error. Path missing';
    exit();
  }

  $param1 = "";

  if(count($path) > 1) {
    $param1 = $path[1];
  }

  $contents = file_get_contents('server.json');

  $json = json_decode($contents, true);

  $method = $_SERVER['REQUEST_METHOD'];

  header('Content-Type: application/json');
  $body = file_get_contents('php://input');

  if($method === 'GET') {
    if($json[$path[0]]) {
      echo json_encode($json[$path[0]]);
    }
  } else {
    echo '[]';
  }

?>