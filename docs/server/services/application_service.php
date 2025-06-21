<?php

include_once __DIR__ . "/../storage/applications/crud.php";

function createApplication(array $application): array|null {
    $application_id = saveApplication($application);
    return getApplicationById($application_id);
}

function getApplicationByEmail(string $application_email): array|null {
    return findApplicationByEmail($application_email);
}