<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'categoryName' => 'Social'
        ]);
        Category::create([
            'categoryName' => 'Technology'
        ]);
        Category::create([
            'categoryName' => 'Nature'
        ]);
        Category::create([
            'categoryName' => 'Politic'
        ]);
        Category::create([
            'categoryName' => 'Beauty'
        ]);
        Category::create([
            'categoryName' => 'Health'
        ]);
    }
}
