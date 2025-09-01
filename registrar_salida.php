<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $area = $_POST['area'];

    $idObjeto = $_POST['idObjeto'];
    $cantidad = $_POST['cantidad'];
    $asunto = ""; // si quieres, puedes agregar un input para asunto

    // Primero, insertar el solicitante si no existe
    $sqlCheck = "SELECT idSolicitante FROM Solicitantes WHERE dni=?";
    $stmt = $conn->prepare($sqlCheck);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $resCheck = $stmt->get_result();

    if ($row = $resCheck->fetch_assoc()) {
        $idSolicitante = $row['idSolicitante'];
    } else {
        $sqlInsertSol = "INSERT INTO Solicitantes (dni, nombres, apellido_paterno, apellido_materno, area) VALUES (?,?,?,?,?)";
        $stmtInsert = $conn->prepare($sqlInsertSol);
        $stmtInsert->bind_param("sssss", $dni, $nombres, $apellido_paterno, $apellido_materno, $area);
        $stmtInsert->execute();
        $idSolicitante = $conn->insert_id;
    }

    // Insertar la salida
    $sqlInsertSalida = "INSERT INTO Salidas (idSolicitante, idObjeto, cantidad, asunto) VALUES (?,?,?,?)";
    $stmtSalida = $conn->prepare($sqlInsertSalida);
    $stmtSalida->bind_param("iiis", $idSolicitante, $idObjeto, $cantidad, $asunto);
    $stmtSalida->execute();

    header("Location: index.php");
    exit;
}
?>
