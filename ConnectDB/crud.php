<?php
function crearCliente($nombre, $apellido, $correo, $telefono, $plan) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO Cliente (Nombre, Apellido, Correo, Telefono, Plan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $plan);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function obtenerCliente($id_cliente) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM Cliente WHERE Id_Cliente = ?");
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function actualizarCliente($id_cliente, $nombre, $apellido, $correo, $telefono, $plan) {
    global $conn;

    $stmt = $conn->prepare("UPDATE Cliente SET Nombre=?, Apellido=?, Correo=?, Telefono=?, Plan=? WHERE Id_Cliente=?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $telefono, $plan, $id_cliente);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function eliminarCliente($id_cliente) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM Cliente WHERE Id_Cliente = ?");
    $stmt->bind_param("i", $id_cliente);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

?>