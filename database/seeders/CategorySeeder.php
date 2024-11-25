<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Akustik'
        ]);
        
        Category::create([
            'name' => 'Mini'
        ]);
        
        Category::create([
            'name' => 'Listrik'
        ]);
    }
}