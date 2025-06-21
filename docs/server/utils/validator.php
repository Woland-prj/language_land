<?php

function validateType(mixed $value, string $type): bool
{
    return match ($type) {
        'string' => is_string($value),
        'int' => is_int($value),
        'float' => is_float($value),
        'bool' => is_bool($value),
        'array' => is_array($value),
        'object' => is_object($value),
        default => false,
    };
}

function validateApplicationRequest(array $body): bool
{
    if (!isset($body['name']) || !validateType($body['name'], "string")) return false;
    if (!isset($body['email']) || !validateType($body['email'], "string")) return false;
    if (!isset($body['course']) || !validateType($body['course'], "string")) return false;
    return match ($body['course']) {
        'english', 'german' => true,
        default => false,
    };
}