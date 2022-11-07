<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Divisi;
use App\Models\Karyawan;
use Database\Factories\KaryawanFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Divisi::create([
            'divisi_name' => 'HRD'
        ]);
        Divisi::create([
            'divisi_name' => 'IT Programmer'
        ]);
        Divisi::create([
            'divisi_name' => 'Marketing'
        ]);

        Karyawan::create([
            'name' => 'Cipto Ahirru',
            'slug' => 'cipto-ahirru',
            'gaji' => '200000'
        ]);
    }
}
