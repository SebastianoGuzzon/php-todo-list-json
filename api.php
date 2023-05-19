<?php
header('Content-Type: application/json');
$data_file = 'todos.json';
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    if (file_exists($data_file)) {
      $json_data = file_get_contents($data_file);
      echo $json_data;
    } else {
      echo json_encode([]);
    }
    break;

  case 'DELETE':
    $index = $_GET['index'];
    $current_data = file_exists($data_file) ? json_decode(file_get_contents($data_file)) : [];
    if (isset($current_data[$index])) {
      array_splice($current_data, $index, 1);
      file_put_contents($data_file, json_encode($current_data));
    }
    echo json_encode($current_data);
    break;

  case 'POST':
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $current_data = file_exists($data_file) ? json_decode(file_get_contents($data_file)) : [];
    $current_data[] = $data->todo;

    file_put_contents($data_file, json_encode($current_data));
    echo json_encode($current_data);
    break;
  default:
    http_response_code(405);
    break;
}