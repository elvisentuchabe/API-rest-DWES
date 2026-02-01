<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(3, true),
            'precio' => $this->faker->randomFloat(2, 10, 200),
            'descripcion' => $this->faker->sentence(),
            'imagen' => 'img/test.jpg',
            'categoria' => 'running',
            'visitas' => 0,
            'stock' => 10
        ];
    }
}