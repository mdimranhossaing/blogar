<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++):

            $faker = Factory::create();

            $name = $faker->word();
            $slug = strtolower($name);

            $categories             = new Category();
            $categories->name       = ucfirst($name);
            $categories->slug       = $slug;
            $categories->created_at = Carbon::now();
            $categories->updated_at = Carbon::now();
            $categories->save();

        endfor;
    }
}
