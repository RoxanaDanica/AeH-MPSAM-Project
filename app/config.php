<?php
/**
 * Configurație centrală Vital Cares
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('APP_NAME', 'Vital Cares');
define('APP_VERSION', '1.0.0');

define('DATA_SOURCE', 'azure');

define('AZURE_SQL_HOST', 'vitalcares.database.windows.net');
define('AZURE_SQL_PORT', 1433);
define('AZURE_SQL_DATABASE', 'vitalcares');

define('AZURE_SQL_USER', 'CloudSAa5305cf1@vitalcares');
define('AZURE_SQL_PASSWORD', 'password123!');

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', BASE_PATH . '/public');

require_once APP_PATH . '/db.php';
require_once APP_PATH . '/helpers.php';
require_once APP_PATH . '/auth.php';
require_once APP_PATH . '/guards.php';
require_once APP_PATH . '/audit.php';
require_once APP_PATH . '/layout.php';
require_once APP_PATH . '/mailer.php';

foreach (glob(APP_PATH . '/repositories/*.php') as $repoFile) {
    require_once $repoFile;
}