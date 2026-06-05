<?php

session_start();

define('BASE_PATH', __DIR__);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '') {
    require BASE_PATH . '/public/index.php';
    exit;
}

$file = BASE_PATH . '/public' . $uri;

if (is_file($file)) {
    require $file;
    exit;
}

$static = BASE_PATH . $uri;

if (is_file($static)) {
    return false;
}

http_response_code(404);
echo "404 - not found: " . htmlspecialchars($uri);