<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {

        $category_ids = Category::pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(25);
            $post->content = $faker->paragraph(2, true);
            $post->image = $faker->imageUrl(300, 300);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
