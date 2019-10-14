<?php

// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();
// DbConnection is a class that Tom wrote
// Step 2: Create & run the query
if (isset($_GET['guid'])) {
  $stmt = $db->prepare(
    'SELECT * FROM Patient
    WHERE patientGuid = ?'
  );
  $stmt->execute([$_GET['guid']]);
} else {
  $stmt = $db->prepare('SELECT * FROM Patient');
  $stmt->execute();
}

$patients = $stmt->fetchAll();
// get all results

// Step 3: Convert to JSON
$json = json_encode($patients, JSON_PRETTY_PRINT);
// give the json representation of the variable
// turn back -> json_decode
// JSON_PRETTY_PRINT puts the results into well-formatted key/value pairs

// Step 4: Output
header('Content-Type: application/json');
// Have to send out the header before any content
echo $json;
