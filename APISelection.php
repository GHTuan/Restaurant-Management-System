<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['ID'])) {
    http_response_code(401);
    echo json_encode(['message' => 'Unauthorized']);
    return;
}

if (!isset($_REQUEST['api'])) {
    http_response_code(400);
    echo json_encode(['message' => 'API Selection is required']);
    return;
}

$api = ucfirst($_REQUEST['api']) . 'API.php';
if (!file_exists('Model/API/' . $api)) {
    http_response_code(400);
    echo json_encode(['message' => 'API Selection is invalid']);
    return;
}

require_once('Model/API/' . $api);