<?php
$serverName = "ChicoBD.mssql.somee.com";
$databaseName = "ChicoBD";
$uid = "";
$pwd = "";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Agora você pode executar consultas e interagir com o banco de dados aqui

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}