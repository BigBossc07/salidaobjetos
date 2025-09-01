<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salida de Objetos</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
    margin: 0;
}

/* Cuadro central */
.cuadro-central {
    width: 900px; /* ancho del cuadro principal */
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 25px;
    margin-top: 20px; /* separación del cuadro superior */
}

/* Subcuadros estirados y centrados */
.subcuadro {
    background-color: #f0f0f0;
    border-radius: 12px;
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
    max-width: 880px; 
    margin: 0 auto;
    box-sizing: border-box;
}

.subcuadro h2 {
    text-align: left;
    color: #504ABC;
    margin-bottom: 12px;
    font-size: 20px;
}

.subcuadro input, .subcuadro select {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
}

button {
    padding: 14px;
    width: 30%;
    background-color: #504ABC;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    align-self: center;
    font-weight: bold;
    font-size: 16px;
}

button:hover {
    background-color: #403a9e;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #504ABC;
    color: white;
    font-size: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
</head>
<body>

<!-- Cuadro morado arriba ocupando todo el ancho -->
<div style="width: 100%; height: 58px; background-color: #504ABC;"></div>

<div class="cuadro-central">

    <!-- Datos del Solicitante -->
    <div class="subcuadro">
        <h2>Datos del Solicitante</h2>
        <input type="text" id="dni" placeholder="DNI">
        <input type="text" id="nombres" placeholder="Nombres">
        <input type="text" id="apellido_paterno" placeholder="Apellido Paterno">
        <input type="text" id="apellido_materno" placeholder="Apellido Materno">
        <input type="text" id="area" placeholder="Área">
    </div>

    <!-- Permiso de Objeto -->
    <div class="subcuadro">
        <h2>Permiso de Objeto</h2>
        <input type="number" id="item" placeholder="Item">
        <select id="objeto">
            <option value="">Seleccione un objeto</option>
            <option value="Laptop">Laptop</option>
            <option value="Monitor">Monitor</option>
            <option value="Impresora">Impresora</option>
            <option value="Silla">Silla</option>
        </select>
        <input type="number" id="cantidad" placeholder="Cantidad">
    </div>

    <!-- Botón Enviar -->
    <button onclick="agregarSalida()">ENVIAR</button>

    <!-- Tabla de Salidas -->
    <div class="subcuadro">
        <table id="tabla_salida">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Objeto</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>DNI</th>
                    <th>Persona</th>
                    <th>Área</th>
                    <th>Asunto</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

</div>

<script>
function agregarSalida(){
    const dni = document.getElementById('dni').value;
    const nombres = document.getElementById('nombres').value;
    const apellidoP = document.getElementById('apellido_paterno').value;
    const apellidoM = document.getElementById('apellido_materno').value;
    const area = document.getElementById('area').value;
    const item = document.getElementById('item').value;
    const objeto = document.getElementById('objeto').value;
    const cantidad = document.getElementById('cantidad').value;

    if(!dni || !nombres || !apellidoP || !apellidoM || !area || !item || !objeto || !cantidad){
        alert("Complete todos los campos");
        return;
    }

    const tabla = document.getElementById('tabla_salida').getElementsByTagName('tbody')[0];
    const fila = tabla.insertRow();
    const fecha = new Date();
    fila.innerHTML = `
        <td>${item}</td>
        <td>${objeto}</td>
        <td>${fecha.toLocaleDateString()}</td>
        <td>${fecha.toLocaleTimeString()}</td>
        <td>${dni}</td>
        <td>${nombres} ${apellidoP} ${apellidoM}</td>
        <td>${area}</td>
        <td>${objeto}</td>
    `;

    // Limpiar inputs
    document.getElementById('dni').value='';
    document.getElementById('nombres').value='';
    document.getElementById('apellido_paterno').value='';
    document.getElementById('apellido_materno').value='';
    document.getElementById('area').value='';
    document.getElementById('item').value='';
    document.getElementById('objeto').value='';
    document.getElementById('cantidad').value='';
}
</script>

</body>
</html>
