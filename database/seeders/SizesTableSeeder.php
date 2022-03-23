<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'name' => 'XL'
        ]);
        Size::create([
            'name' => 'L'
        ]);
        Size::create([
            'name' => 'M'
        ]);
        Size::create([
            'name' => 'S'
        ]);
        Size::create([
            'name' => 'XXL'
        ]);
    }
}
