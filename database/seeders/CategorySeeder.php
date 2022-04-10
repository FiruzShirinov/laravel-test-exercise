<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::insert([
            [
                'name'          => 'Dairy',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Pastries',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Vegetables',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Fruits',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Canned goods',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Hunting goods',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Meat',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Electronics',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Video games',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Perfume',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ]);
    }
}
