<?php
// Ottieni i dati dei To-do dalla richiesta POST
$data = file_get_contents("php://input");
$todos = json_decode($data, true);

// Scrivi i dati nel file JSON
$file = 'todos.json';
file_put_contents($file, json_encode($todos));

// Invia una risposta di conferma
$response = array('status' => 'success', 'message' => 'To-do list saved successfully.');
echo json_encode($response);