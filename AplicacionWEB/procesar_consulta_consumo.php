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

// Obtener el ID del medidor desde el formulario
$id_medidor = $_POST['id_medidor'];

// Consulta para obtener el consumo del medidor
$sql = "SELECT lp.FECHA_LECTURA, lp.CONSUMO 
        FROM lectura_periodica lp 
        WHERE lp.ID_MEDIDOR = '$id_medidor'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Consulta de Consumo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl">Resultado de Consulta de Consumo</h1>
        </div>
    </header>
    <section id="resultado" class="py-8">
        <div class="container mx-auto">
            <?php
            if ($result->num_rows > 0) {
                echo "<h2 class='text-2xl mb-4'>Consumo del Medidor $id_medidor</h2>";
                echo "<table class='min-w-full bg-white border'>
                        <thead>
                            <tr>
                                <th class='py-2 px-4 border-b'>Fecha de Lectura</th>
                                <th class='py-2 px-4 border-b'>Consumo</th>
                            </tr>
                        </thead>
                        <tbody>";
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='py-2 px-4 border-b'>" . $row["FECHA_LECTURA"]. "</td>
                            <td class='py-2 px-4 border-b'>" . $row["CONSUMO"]. "</td>
                          </tr>";
                }
                echo "  </tbody>
                      </table>";
            } else {
                echo "<p class='text-red-500'>No se encontraron registros de consumo para el medidor $id_medidor.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
    </section>
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Registro de Clientes y Lecturas de Medidores</p>
        </div>
    </footer>
</body>
</html>
