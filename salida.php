<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salida de Objetos</title>
<link rel="stylesheet" href="styles.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <h1>Salida de Objetos</h1>
</header>

<section class="formulario-salida">
    <h2>Registrar salida</h2>
    <form id="formRegistro">
        <label>DNI del solicitante:</label>
        <input type="text" name="dni" id="dni" required>

        <label>ID del objeto:</label>
        <input type="number" name="idObjeto" id="idObjeto" required>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <label>Asunto:</label>
        <input type="text" name="asunto" id="asunto" required>

        <button type="submit">Registrar</button>
    </form>
</section>

<section class="tabla-salida">
    <h2>Lista de salidas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Solicitante</th>
                <th>Objeto</th>
                <th>Cantidad</th>
                <th>Asunto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaDatos">
            <!-- AJAX llenará esta sección -->
        </tbody>
    </table>
</section>

<!-- Modal editar -->
<div id="modalEditar" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Editar registro</h2>
        <form id="formEditar">
            <input type="hidden" id="editId">
            <label>DNI del solicitante:</label>
            <input type="text" id="editDNI" required>

            <label>ID del objeto:</label>
            <input type="number" id="editIdObjeto" required>

            <label>Cantidad:</label>
            <input type="number" id="editCantidad" min="1" required>

            <label>Asunto:</label>
            <input type="text" id="editAsunto" required>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</div>

<script src="scripts.js"></script>
</body>
</html>
