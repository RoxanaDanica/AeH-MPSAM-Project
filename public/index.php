<?php

require_once __DIR__ . '/../app/config.php';

echo "<h1>CONFIG OK</h1>";

$result = isLoggedIn();

echo "<h1>isLoggedIn() = ";
var_dump($result);
echo "</h1>";