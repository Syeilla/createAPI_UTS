<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Mahasiswa::class;

    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->numerify('20######'),
            'nama' => $this->faker->name(),
            'prodi' => $this->faker->randomElement(['TI','SI','MI','TK']),
            'angkatan' => $this->faker->numberBetween(2018, 2024),
            'meta' => json_encode([
                'alamat' => $this->faker->address(),
                'telepon' => $this->faker->phoneNumber()
            ]),
        ];
    }
}
