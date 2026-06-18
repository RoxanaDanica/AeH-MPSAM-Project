<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/guards.php';
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/audit.php';

foreach (glob(__DIR__ . '/repositories/*.php') as $repo) {
    require_once $repo;
}