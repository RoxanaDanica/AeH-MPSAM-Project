<?php

// require_once __DIR__ . '/../app/config.php';
// require_once __DIR__ . '/../app/guards.php';
require_once __DIR__ . '/../app/bootstrap.php';
// require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (preg_match('/\.(css|js|png|jpg|jpeg|gif|svg|ico)$/i', $path)) {
    return false;
}

if (!isLoggedIn()) {
    redirect(url('login.php'));
    exit;
}

$user = currentUser();

switch ($user['rol']) {
    case 'medic':
        redirect(url('dashboard_medic.php'));
        break;

    case 'pacient':
        redirect(url('dashboard_pacient.php'));
        break;

    default:
        redirect(url('login.php'));
        break;
}

exit;