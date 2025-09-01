<?php
include("conexion.php");

$id = $_POST['editId'];
$dni = $_POST['editDNI'];
$idObjeto = $_POST['editIdObjeto'];
$cantidad = $_POST['editCantidad'];
$asunto = $_POST['editAsunto'];

// Buscar idSolicitante por DNI
$stmt = $conn->prepare("SELECT idSolicitante FROM solicitantes WHERE dni=?");
$stmt->bind_param("s",$dni);
$stmt->execute();
$result = $stmt->get_result();

if($row=$result->fetch_assoc()){
    $idSolicitante = $row['idSolicitante'];
    $stmtUpdate = $conn->prepare("UPDATE salidas SET idSolicitante=?, idObjeto=?, cantidad=?, asunto=? WHERE id=?");
    $stmtUpdate->bind_param("iiiis",$idSolicitante,$idObjeto,$cantidad,$asunto,$id);
    $stmtUpdate->execute();
    echo "Registro actualizado correctamente";
}else{
    echo "Solicitante no encontrado";
}
?>
