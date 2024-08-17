<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Coche con programacion Estructurada</title>
    <!-- Enlace a Bootstrap CSS para un diseño moderno -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .result-container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
        }
        .alert-info {
            background-color: #d9fbee;
            color: #1f7f7f;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Información del Coche con programacion Estructurada</h1>

        <?php
        // Datos del coche
        $marca = 'Toyota';
        $modelo = 'Corolla';
        $ano = 2023;
        $color = 'Rojo';
        $precio = 20000;

        // Función para mostrar la información del coche
        function mostrarInformacion($marca, $modelo, $ano, $color, $precio) {
            echo '<div class="result-container alert alert-info">';
            echo '<h2>Información del Coche</h2>';
            echo '<strong>Marca:</strong> ' . htmlspecialchars($marca) . '<br>';
            echo '<strong>Modelo:</strong> ' . htmlspecialchars($modelo) . '<br>';
            echo '<strong>Año:</strong> ' . htmlspecialchars($ano) . '<br>';
            echo '<strong>Color:</strong> ' . htmlspecialchars($color) . '<br>';
            echo '<strong>Precio:</strong> $' . $precio . '<br>';
            echo '</div>';
        }

        // Función para calcular y mostrar el descuento
        function calcularDescuento($precio, $porcentajeDescuento) {
            if ($porcentajeDescuento < 0 || $porcentajeDescuento > 100) {
                return '<div class="result-container alert alert-danger">Porcentaje de descuento inválido.</div>';
            }
            $descuento = ($precio * $porcentajeDescuento) / 100;
            $precioConDescuento = $precio - $descuento;

            return '<div class="result-container alert alert-success">' .
                   '<h2>Precio con Descuento</h2>' .
                   '<strong>Precio original:</strong> $' . number_format($precio, 2) . '<br>' .
                   '<strong>Descuento aplicado:</strong> ' . htmlspecialchars($porcentajeDescuento) . '%<br>' .
                   '<strong>Precio después del descuento:</strong> $' . number_format($precioConDescuento, 2) . '<br>' .
                   '</div>';
        }

        // Mostrar la información del coche
        mostrarInformacion($marca, $modelo, $ano, $color, $precio);

        // Procesar el formulario si se envía
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['descuento'])) {
            $porcentajeDescuento = (float)$_POST['descuento'];
            echo calcularDescuento($precio, $porcentajeDescuento);
        }
        ?>

        <!-- Formulario para aplicar el descuento -->
        <form method="post" class="text-center mt-4">
            <div class="form-group">
                <label for="descuento">Ingrese porcentaje de descuento:</label>
                <input type="number" id="descuento" name="descuento" class="form-control" step="0.01" min="0" max="200" required>
            </div>
            <button type="submit" class="btn btn-primary">Aplicar Descuento</button>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS y dependencias -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
