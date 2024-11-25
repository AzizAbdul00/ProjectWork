<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $category1 = Category::find(1);
        $category2 = Category::find(2);
        $category3 = Category::find(3);

        // Menambahkan produk manual
        Product::create([
            'name' => 'Yamaha - FG/FS Series',
            'description' => 'Fondasi gitar akustik Yamaha. FG/FS series yang bervariasi mulai dari jajaran premium sampai standar menghadirkan tingkat ekspresi yang lebih tinggi untuk setiap penyanyi-penulis lagu.',
            'price' => 3000000,
            'image' => 'image_path.jpg',
            'user_id' => $user->id,  
            'category_id' => $category2->id,
        ]);
        
        Product::create([
            'name' => 'Yamaha - REVSTAR ',
            'description' => 'Revstar memiliki tampilan yang terinspirasi sepeda motor café racer. Untuk pemain yang mencari gaya atau suara baru, Revstar memiliki opsi pickup switching yang versatile.',
            'price' => 12000000,
            'image' => 'image_path.jpg',
            'user_id' => $user->id,  
            'category_id' => $category1->id,
        ]);
        
        Product::create([
            'name' => 'Yamaha - CSF',
            'description' => 'Gitar CSF series memadukan portabilitas gitar travel dengan tone yang terfokus dan playability dari gitar parlor,serta menghasilkan suara yang full dan resonan.',
            'price' => 7500000,
            'image' => 'image_path.jpg',
            'user_id' => $user->id,  
            'category_id' => $category3->id,
        ]);
    }
}