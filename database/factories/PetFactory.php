<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_hewan' => $this->faker->firstName(), // Nama Hewan
            'jenis_hewan' => $this->faker->randomElement(['Anjing', 'Kucing', 'Kelinci', 'Burung', 'Iguana']),
            'ras' => $this->faker->randomElement(['Golden Retriever', 'Persia', 'Lop', 'Lovebird', 'Green Iguana']),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'nama_pemilik' => $this->faker->name(),
            'kontak_pemilik' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}