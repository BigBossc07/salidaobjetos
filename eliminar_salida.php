<?php
include("conexion.php");

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM salidas WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

echo "Registro eliminado correctamente";
?>
