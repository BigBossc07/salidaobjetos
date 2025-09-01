<?php
include("conexion.php");

// Verificar si llega el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $idObjeto = $_POST['idObjeto'];
    $cantidad = $_POST['cantidad'];
    $asunto = $_POST['asunto'];

    // Buscar al solicitante por DNI
    $sql = "SELECT idSolicitante FROM solicitantes WHERE dni = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $idSolicitante = $row['idSolicitante'];

        // Insertar salida
        $sqlInsert = "INSERT INTO salidas (idSolicitante, idObjeto, cantidad, asunto) 
                      VALUES (?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("iiis", $idSolicitante, $idObjeto, $cantidad, $asunto);
        $stmtInsert->execute();
    }

    // Redirigir al inicio
    header("Location: index.php");
    exit;
}
?>
