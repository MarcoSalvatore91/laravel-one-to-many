<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['label' => 'HTML', 'color' => 'danger'],
            ['label' => 'CSS', 'color' => 'secondary'],
            ['label' => 'JavaScript', 'color' => 'success'],
            ['label' => 'Vue', 'color' => 'primary'],
            ['label' => 'PHP', 'color' => 'warning'],
            ['label' => 'SQL', 'color' => 'info'],
            ['label' => 'Laravel', 'color' => 'light'],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->label = $category['label'];
            $newCategory->color = $category['color'];
            $newCategory->save();
        }
    }
}
