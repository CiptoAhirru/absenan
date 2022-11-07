<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absen>
 */
class AbsenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'karyawan_id' => mt_rand(1,3),
            // 'divisi_id' => mt_rand(1,3),
            // 'jam_masuk' => $this->faker->time(),
            // 'jam_keluar' =>$this->faker->time(),
            // 'terlambat' =>$this->faker->time(),
            // 'pulang_awal' =>$this->faker->time(),
            // 'tanggal' => $this->faker->date()
        ];
    }
}
