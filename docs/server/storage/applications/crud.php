<?php

include_once __DIR__ . "/../connection.php";

function saveApplication(array $application): string|null
{
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare("INSERT INTO applications (name, email, course) VALUES (?, ?, ?)");
    $result = $stmt->execute([$application['name'],  $application['email'], $application['course']]);
    if ($result) {
        return $pdo->lastInsertId();
    }
    return null;
}

function getApplicationById(string $application_id): array|null
{
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE id = ?");
    $stmt->execute([$application_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result === false ? null : $result;
}

function findApplicationByEmail(string $application_email): array|null
{
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE email = ?");
    $stmt->execute([$application_email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result === false ? null : $result;
}