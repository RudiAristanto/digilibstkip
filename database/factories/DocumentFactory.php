<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(5),
            'abstrak' => $this->faker->sentence(10),
            'tahun' => $this->faker->year,
            'kategori_id' => $this->faker->numberBetween(1,3),
            'writer_id' => $this->faker->numberBetween(1,2),
            'upload' => '',
        ];
    }
}
