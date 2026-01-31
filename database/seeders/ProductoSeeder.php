<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\File;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buscamos el archivo
        $ruta = base_path('productos.json');
        $this->command->info("Buscando archivo en: " . $ruta);

        if (!File::exists($ruta)) {
            $this->command->error("¡ERROR! No encuentro el archivo productos.json en la raíz.");
            $this->command->warn("Por favor, copia el archivo json a la carpeta principal del proyecto.");
            return;
        }

        // 2. Leemos el archivo
        $json = File::get($ruta);
        $productos = json_decode($json);

        if (is_null($productos)) {
            $this->command->error("¡ERROR! El archivo existe pero el JSON no es válido o está vacío.");
            return;
        }

        // 3. Borramos e insertamos
        Producto::truncate();
        $this->command->info("Tabla limpiada. Insertando " . count($productos) . " productos...");

        foreach ($productos as $item) {
            Producto::create([
                'id' => $item->id,
                'nombre' => $item->nombre,
                'precio' => $item->precio,
                'descripcion' => $item->descripcion ?? '',
                'imagen' => $item->imagen ?? null,
                'categoria' => $item->categoria ?? null,
                'visitas' => $item->visitas ?? 0,
                'stock' => $item->stock ?? 0,
            ]);
        }
        
        $this->command->info("¡ÉXITO! Se han guardado los productos.");
    }
}
