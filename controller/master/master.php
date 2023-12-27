/**
* Includes required files, connects to database, gets request type,
* decodes JSON request data, and sanitizes input.
*/

<?php

include_once '../model/db.php';
include_once '../model/helper.php';
include_once '../model/response.php';

$conn = connectToDatabase();

$type = isset($_GET['type']) ? $_GET['type'] : 'default';

$json_data = file_get_contents('php://input');
$data = sanitizeJSON(json_decode($json_data, true));

if($type === 'stage') {
   echo(json_encode("stage"));
}