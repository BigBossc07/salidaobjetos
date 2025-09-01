<?php
include("conexion.php");

$sql = "SELECT 
            s.idSalida, 
            s.cantidad, 
            s.asunto, 
            sol.dni, 
            sol.nombres, 
            sol.apellido_paterno, 
            sol.apellido_materno, 
            sol.area,
            o.nombreObjeto
        FROM Salidas s
        JOIN Solicitantes sol ON s.idSolicitante = sol.idSolicitante
        JOIN Objetos o ON s.idObjeto = o.idObjeto
        ORDER BY s.idSalida DESC";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $persona = $row['nombres']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
    echo "<tr>
            <td>{$row['idSalida']}</td>
            <td>{$row['nombreObjeto']}</td>
            <td>".date("Y-m-d")."</td>
            <td>".date("H:i:s")."</td>
            <td>{$row['dni']}</td>
            <td>{$persona}</td>
            <td>{$row['area']}</td>
            <td>{$row['asunto']}</td>
          </tr>";
}
?>
