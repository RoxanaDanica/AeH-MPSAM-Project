<?php

echo "<h1>INDEX.php</h1>";

require_once __DIR__ . '/../app/config.php';

echo "<h1>CONFIG</h1>";

if (function_exists('isLoggedIn')) {
    echo "<h1>isLoggedIn</h1>";
} else {
    echo "<h1>isLoggedIn</h1>";
}