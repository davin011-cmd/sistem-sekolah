<?php
  

namespace Database\Seeders;

use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        foreach (['10 AKL', '11 AKL', '12 TKJ 1', '12 TKJ 2'] as $name) {
            SchoolClass::create(['name' => $name]);
        }

        foreach (['AKL', 'TKJ', 'BiD'] as $name) {
            Major::create(['name' => $name]);
        }

        Student::factory()->count(100)->create();
    }
}