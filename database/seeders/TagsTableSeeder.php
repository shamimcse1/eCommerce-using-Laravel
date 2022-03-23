<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Shirt'
        ]);
        Tag::create([
            'name' => 'Pant'
        ]);
        Tag::create([
            'name' => 'Winter'
        ]);
        Tag::create([
            'name' => 'Watch'
        ]);
        Tag::create([
            'name' => 'Mobile'
        ]);
    }
}
