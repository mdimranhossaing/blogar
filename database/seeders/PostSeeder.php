<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++):

            $faker      = Factory::create();

            $title      = $faker->sentence();
            $slug       = explode(' ',$title);
            $slug       = implode('-', $slug);
            $content    = $faker->words(40, true);
            $excerpt    = explode(' ',$content);
            $excerpt    = array_slice($excerpt, 0, 10);
            $excerpt    = implode(' ', $excerpt);

            $posts      = new Post();

            $posts->title       = $title;
            $posts->slug        = strtolower($slug);
            $posts->excerpt     = $excerpt;
            $posts->content     = $content;
            $posts->thumbnail   = $faker->imageUrl(1414, 707);
            $posts->views       = $faker->numberBetween(300, 10000);
            $posts->likes       = $faker->numberBetween(300, 10000);
            $posts->category_id = $faker->numberBetween(1, 5);
            $posts->tag_id      = $faker->numberBetween(1, 5);
            $posts->user_id     = $faker->numberBetween(1, 5);
            $posts->created_at  = Carbon::now();
            $posts->updated_at  = Carbon::now();
            $posts->save();

        endfor;
    }
}
