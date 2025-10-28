<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->makeCategories(0, null);
    }

    public function makeCategories($layer, $parent) {
        if($layer < 3) {
            $categories = Category::factory(rand(4-$layer,4))->create(['category_id' => $parent->id ?? null]);
            foreach($categories as $category) {
                $this->makeCategories($layer+1, $category);
            }
        }
    }
}
