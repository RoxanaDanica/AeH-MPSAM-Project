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
               ";Encrypt=yes" .
               ";TrustServerCertificate=no" .
               ";Connection Timeout=5";

        $pdo = new PDO(
            $dsn,
            AZURE_SQL_USER,
            AZURE_SQL_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,

                PDO::ATTR_TIMEOUT => 5,
            ]
        );

        return $pdo;

    } catch (PDOException $ex) {

        error_log("DB connection failed: " . $ex->getMessage());

        die("Database connection failed. Please try again later.");
    }
}

function isMockMode() {
    return DATA_SOURCE === 'mock';
}