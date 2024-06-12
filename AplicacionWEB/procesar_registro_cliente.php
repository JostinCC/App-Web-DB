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
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];

// Insertar datos en la tabla cliente
$sql = "INSERT INTO cliente (NOMBRE, CEDULA, DIRECCION) VALUES ('$nombre', '$cedula', '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo cliente registrado exitosamente";
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
    <title>Registro de Clientes y Lecturas de Medidores</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl">Registro de Clientes y Lecturas de Medidores</h1>
        </div>
    </header>
    <nav class="bg-gray-700 py-2">
        <div class="container mx-auto flex justify-center">
            <a href="#registrar_cliente" class="text-white hover:text-gray-300 mx-4">Registrar Cliente</a>
            <a href="registrar_lectura.html" class="text-white hover:text-gray-300 mx-4">Registrar Lectura de Medidor</a>
            <a href="#consultar_numero" class="text-white hover:text-gray-300 mx-4">Consultar Consumo por Número de Medidor</a>
            <a href="#consultar_cedula" class="text-white hover:text-gray-300 mx-4">Consultar Consumo por Cédula de Cliente</a>
        </div>
    </nav>
    <section id="registrar_cliente" class="py-8">
        <div class="container mx-auto">
            <h2 class="text-2xl mb-4">Registrar Cliente</h2>
            <form action="procesar_registro_cliente.php" method="post" class="w-full max-w-md">
                <div class="flex flex-wrap mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="cedula" class="block text-gray-700 text-sm mb-2">Cédula:</label>
                    <input type="text" id="cedula" name="cedula" required class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-wrap mb-4">
                    <label for="direccion" class="block text-gray-700 text-sm mb-2">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <input type="submit" value="Registrar Cliente" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </form>
            
        </div>
    </section>
    <!-- Las otras secciones y formularios aquí -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Registro de Clientes y Lecturas de Medidores</p>
        </div>
    </footer>
</body>
</html>
