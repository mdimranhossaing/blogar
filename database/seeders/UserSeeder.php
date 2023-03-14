<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++):

            $faker      = Factory::create();

            $name       = $faker->name();
            $username   = explode(' ',$name);
            $username   = implode('',$username);
            $username   = strtolower($username);

            $users      = new User();

            $users->username            = $username;
            $users->name                = $name;
            $users->profile_picture     = $faker->imageUrl(50,50);
            $users->email               = $faker->freeEmail();
            $users->email_verified_at   = Carbon::now();
            $users->password            = Hash::make('12345');
            $users->facebook_link       = $faker->url();
            $users->instagram_link      = $faker->url();
            $users->twitter_link        = $faker->url();
            $users->website_link        = $faker->url();
            $users->created_at          = Carbon::now();
            $users->updated_at          = Carbon::now();
            $users->save();

        endfor;
    }
}
