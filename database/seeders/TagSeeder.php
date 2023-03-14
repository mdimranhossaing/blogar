<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++):

            $faker  = Factory::create();

            $name   = $faker->word();
            $slug   = strtolower($name);

            $tags   = new Tag();

            $tags->name         = ucfirst($name);
            $tags->slug         = $slug;
            $tags->created_at   = Carbon::now();
            $tags->updated_at   = Carbon::now();
            $tags->save();

        endfor;
    }
}
