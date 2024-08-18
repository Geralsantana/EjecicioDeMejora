<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Coche</title>
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
        <h1 class="text-center mb-4">Información del Coche POO</h1>

        <?php
        class Coche {
            private $marca;
            private $modelo;
            private $ano;
            private $color;
            private $precio;

            public function __construct($marca, $modelo, $ano, $color, $precio) {
                $this->marca = $marca;
                $this->modelo = $modelo;
                $this->ano = $ano;
                $this->color = $color;
                $this->precio = $precio;
            }

            public function obtenerMarca() {
                return $this->marca;
            }

            public function obtenerModelo() {
                return $this->modelo;
            }

            public function obtenerAno() {
                return $this->ano;
            }

            public function obtenerColor() {
                return $this->color;
            }

            public function obtenerPrecio() {
                return $this->precio;
            }

            public function mostrarInformacion() {
                echo '<div class="result-container alert alert-info">';
                echo '<h2>Información del Coche</h2>';
                echo '<strong>Marca:</strong> ' . $this->obtenerMarca() . '<br>';
                echo '<strong>Modelo:</strong> ' . $this->obtenerModelo() . '<br>';
                echo '<strong>Año:</strong> ' . 
                $this->obtenerAno() . '<br>';
                echo '<strong>Color:</strong> ' . $this->obtenerColor() . '<br>';
                echo '<strong>Precio:</strong> $' . number_format($this->obtenerPrecio(), 2) . '<br>';
                echo '</div>';
            }

            public function calcularDescuento($porcentajeDescuento) {
                $descuento = ($this->precio * $porcentajeDescuento) / 100;
                $precioConDescuento = $this->precio - $descuento;

                return '<div class="result-container alert alert-success">' .
                       '<h2>Precio con Descuento</h2>' .
                       '<strong>Precio original:</strong> $' . number_format($this->precio, 2) . '<br>' .
                       '<strong>Descuento aplicado:</strong> ' . $porcentajeDescuento . '%<br>' .
                       '<strong>Precio después del descuento:</strong> $' . number_format($precioConDescuento, 2) . '<br>' .
                       '</div>';
            }
        }

        // Instanciamos el objeto coche
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $coche->mostrarInformacion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['descuento'])) {
            $porcentajeDescuento = (float)$_POST['descuento'];
            echo $coche->calcularDescuento($porcentajeDescuento);
        }
        ?>

        <!-- Formulario para aplicar el descuento -->
        <form method="post" class="text-center mt-4">
            <div class="form-group">
                <label for="descuento">Ingrese porcentaje de descuento:</label>
                <input type="number" id="descuento" name="descuento" class="form-control" step="0.01" min="0" max="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Aplicar Descuento</button>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
