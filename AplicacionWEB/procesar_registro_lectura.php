<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_clientes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$id_medidor = $_POST['id_medidor'];
$fecha_lectura = $_POST['fecha_lectura'];
$consumo = $_POST['consumo'];

// Insertar datos en la tabla lectura_periodica
$sql = "INSERT INTO lectura_periodica (ID_MEDIDOR, FECHA_LECTURA, CONSUMO) VALUES ('$id_medidor', '$fecha_lectura', '$consumo')";

if ($conn->query($sql) === TRUE) {
    echo "Lectura registrada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Lectura de Medidor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl">Registrar Lectura de Medidor</h1>
        </div>
    </header>
    <nav class="bg-gray-700 py-2">
        <div class="container mx-auto flex justify-center">
            <a href="index.html#registrar_cliente" class="text-white hover:text-gray-300 mx-4">Registrar Cliente</a>
            <a href="procesar_registro_lectura.php" class="text-white hover:text-gray-300 mx-4">Registrar Lectura de Medidor</a>
            <a href="index.html#consultar_numero" class="text-white hover:text-gray-300 mx-4">Consultar Consumo por Número de Medidor</a>
            <a href="index.html#consultar_cedula" class="text-white hover:text-gray-300 mx-4">Consultar Consumo por Cédula de Cliente</a>
        </div>
    </nav>
    <section id="registrar_lectura" class="py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl mb-4">Registrar Lectura de Medidor</h2>
            <form action="procesar_registro_lectura.php" method="post" class="w-full max-w-md">
                <div class="flex flex-wrap mb-4">
                    <label for="id_medidor" class="block text-gray-700 text-sm mb-2">ID del Medidor:</label>
                    <input type="text" id="id_medidor" name="id_medidor" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="fecha_lectura" class="block text-gray-700 text-sm mb-2">Fecha de Lectura:</label>
                    <input type="date" id="fecha_lectura" name="fecha_lectura" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="consumo" class="block text-gray-700 text-sm mb-2">Consumo:</label>
                    <input type="number" id="consumo" name="consumo" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <input type="submit" value="Registrar Lectura" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </form>
        </div>
    </section>
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Registro de Clientes y Lecturas de Medidores</p>
        </div>
    </footer>
</body>
</html>
