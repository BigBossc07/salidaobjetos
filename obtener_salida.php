<?php
include("conexion.php");

$id = $_GET['id'];
$sql = "SELECT s.id, sol.dni, s.idObjeto, s.cantidad, s.asunto
        FROM salidas s
        INNER JOIN solicitantes sol ON s.idSolicitante = sol.idSolicitante
        WHERE s.id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
echo json_encode($data);
?>
