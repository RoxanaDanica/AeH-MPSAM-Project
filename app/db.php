<?php

function db() {
    static $pdo = null;

    if (DATA_SOURCE === 'mock') {
        return null;
    }

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        $dsn = "sqlsrv:Server=tcp:" . AZURE_SQL_HOST . "," . AZURE_SQL_PORT .
               ";Database=" . AZURE_SQL_DATABASE .
               ";Encrypt=true;TrustServerCertificate=true";

        $pdo = new PDO(
            $dsn,
            AZURE_SQL_USER,
            AZURE_SQL_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

    } catch (PDOException $ex) {
        die("DB ERROR: " . $ex->getMessage());
    }

    return $pdo;
}

function isMockMode() {
    return DATA_SOURCE === 'mock';
}