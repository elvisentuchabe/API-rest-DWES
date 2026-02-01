<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoApiTest extends TestCase
{
    // Usamos RefreshDatabase para que la BD se limpie y reinicie en cada test
    use RefreshDatabase;

    /**
     * Prueba 1: GET /api/productos (Listado)
     */
    public function test_puedo_obtener_lista_productos()
    {
        // Creamos 3 productos falsos usando el Factory
        Producto::factory()->count(3)->create();

        // Hacemos la petición GET
        $response = $this->getJson('/api/productos');

        // Verificaciones: Status 200 y que vengan 3 items
        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /**
     * Prueba 2: POST /api/productos (Crear)
     */
    public function test_puedo_crear_un_producto()
    {
        $datos = [
            'nombre' => 'Zapatillas Test',
            'precio' => 99.99,
            'categoria' => 'running',
            'descripcion' => 'Descripción de prueba',
            'imagen' => 'img/test.jpg'
        ];

        // Hacemos petición POST
        $response = $this->postJson('/api/productos', $datos);

        // Verificamos: Status 201 (Created) y que devuelva el nombre
        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Zapatillas Test']);

        // Verificamos que esté guardado en la base de datos
        $this->assertDatabaseHas('productos', ['nombre' => 'Zapatillas Test']);
    }

    /**
     * Prueba 3: GET /api/productos/{id} (Ver detalle)
     */
    public function test_puedo_ver_un_producto_individual()
    {
        $producto = Producto::factory()->create(['nombre' => 'Producto Único']);

        $response = $this->getJson("/api/productos/{$producto->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Producto Único']);
    }

    /**
     * Prueba 4: PUT /api/productos/{id} (Actualizar)
     */
    public function test_puedo_actualizar_un_producto()
    {
        $producto = Producto::factory()->create(['precio' => 100]);

        $nuevosDatos = ['precio' => 150];

        // Hacemos petición PUT
        $response = $this->putJson("/api/productos/{$producto->id}", $nuevosDatos);

        $response->assertStatus(200);

        // Verificamos que en la BD el precio haya cambiado
        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'precio' => 150
        ]);
    }

    /**
     * Prueba 5: DELETE /api/productos/{id} (Borrar)
     */
    public function test_puedo_eliminar_un_producto()
    {
        $producto = Producto::factory()->create();

        // Hacemos petición DELETE
        $response = $this->deleteJson("/api/productos/{$producto->id}");

        $response->assertStatus(204); // 204 = Sin contenido (éxito)

        // Verificamos que YA NO esté en la BD
        $this->assertDatabaseMissing('productos', ['id' => $producto->id]);
    }
}