<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../index2.php';

class MarcaTest extends TestCase
{
    public function testObtenerMarca()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $this->assertEquals('Toyota', $coche->obtenerMarca());
    }

    public function testObtenerModelo()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $this->assertEquals('Corolla', $coche->obtenerModelo());
    }

    public function testObtenerAno()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $this->assertEquals(2023, $coche->obtenerAno());
    }

    public function testObtenerColor()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $this->assertEquals('Rojo', $coche->obtenerColor());
    }

    public function testObtenerPrecio()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $this->assertEquals(20000, $coche->obtenerPrecio());
    }

    public function testCalcularDescuento()
    {
        $coche = new Coche('Toyota', 'Corolla', 2023, 'Rojo', 20000);
        $precioConDescuento = $coche->calcularDescuento(10); // 10% de descuento
        $this->assertStringContainsString('$18,000.00', $precioConDescuento);
    }
}
