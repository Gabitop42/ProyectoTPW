<?php

function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RampalBD";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    return $conn;
}

function disconnect($conn) {
    $conn->close();
}

?>