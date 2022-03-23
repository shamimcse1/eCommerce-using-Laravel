<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name' => 'Red'
        ]);
        Color::create([
            'name' => 'Yellow'
        ]);
        Color::create([
            'name' => 'Pink'
        ]);
        Color::create([
            'name' => 'Blue'
        ]);
        Color::create([
            'name' => 'Green'
        ]);
    }
}
