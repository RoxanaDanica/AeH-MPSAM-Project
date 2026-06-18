<?php
// require_once dirname(__DIR__) . '/app/config.php';
// require_once  dirname(__DIR__) . '/app/guards.php';
require_once __DIR__ . '/../app/bootstrap.php';

logout();
flash('success', 'Te-ai deconectat cu succes.');
redirect(url('login.php'));
