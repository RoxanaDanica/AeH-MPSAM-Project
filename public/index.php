<?php

// require_once dirname(__DIR__) . '/app/config.php';
require_once __DIR__ . '/../app/config.php';

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