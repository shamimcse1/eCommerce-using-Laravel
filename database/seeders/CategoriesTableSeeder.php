<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Winter',
            'description' => 'Winter Collection'
        ]);
        Category::create([
            'title' => 'Summer',
            'description' => 'Summer Collection'
        ]);
        Category::create([
            'title' => 'Jacket',
            'description' => 'Jacket Collection'
        ]);
        Category::create([
            'title' => 'Fancy',
            'description' => 'Fancy Collection'
        ]);
        Category::create([
            'title' => 'Suit',
            'description' => 'Suit Collection'
        ]);
    }
}
