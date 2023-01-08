<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            ['name' => 'magento'],
            ['name' => 'react'],
            ['name' => 'flutter'],
            ['name' => 'react-native'],
            ['name' => 'angular'],
            ['name' => 'laravel'],
            ['name' => 'vue'],
        ];

        Technology::insert($technologies);
    }
}
