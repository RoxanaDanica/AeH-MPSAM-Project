<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('CSRF_TOKEN_NAME', '_csrf_token');
define('APP_NAME', 'Vital Cares');
define('APP_VERSION', '1.0.0');

define('DATA_SOURCE', 'azure');

define('AZURE_SQL_HOST', 'vitalcares.database.windows.net');
define('AZURE_SQL_PORT', 1433);
define('AZURE_SQL_DATABASE', 'vitalcares');
define('AZURE_SQL_USER', 'CloudSAa5305cf1');
define('AZURE_SQL_PASSWORD', 'password123!');

define('BASE_PATH', realpath(__DIR__ . '/..'));

define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('DATA_PATH', BASE_PATH . '/data');
define('ASSETS_URL', '/assets');

require_once APP_PATH . '/db.php';
require_once APP_PATH . '/helpers.php';
require_once APP_PATH . '/auth.php';
require_once APP_PATH . '/guards.php';
require_once APP_PATH . '/audit.php';
// require_once APP_PATH . '/layout.php';
require_once APP_PATH . '/mailer.php';

foreach (glob(APP_PATH . '/repositories/*.php') as $repoFile) {
    require_once $repoFile;
}

if (DATA_SOURCE === 'mock') {
    require_once DATA_PATH . '/mock_data.php';
}