function db() {
    static $pdo = null;

    if (DATA_SOURCE === 'mock') {
        return null;
    }

    if ($pdo !== null) {
        return $pdo;
    }

    try {
        $server = AZURE_SQL_HOST;

        $dsn = "sqlsrv:Server=$server;Database=" . AZURE_SQL_DATABASE;

        $pdo = new PDO(
            $dsn,
            AZURE_SQL_USER,
            AZURE_SQL_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_TIMEOUT => 5
            ]
        );

        return $pdo;

    } catch (PDOException $ex) {
        die("DB connection failed: " . $ex->getMessage());
    }
}