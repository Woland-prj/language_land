<?php

include_once "../server/utils/validator.php";
include_once "../server/services/application_service.php";
header("Content-type: application/json; charset=utf-8");

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Request method must be POST']);
    exit();
}

$body = json_decode(file_get_contents('php://input'), true);

if (!$body || !validateApplicationRequest($body)) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid JSON']);
    exit();
}

$old = getApplicationByEmail($body['email']);

if ($old !== null) {
    http_response_code(409);
    echo json_encode(['message' => 'Application already exists']);
    exit();
}

$application = createApplication($body);

if ($application) {
    http_response_code(200);
    echo json_encode($application);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Internal Server Error']);
}