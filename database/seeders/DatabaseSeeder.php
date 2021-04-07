<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tags;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Alperen',
            'email' => 'test@test.com',
            'password' => Hash::make('1'),
        ]);
        User::factory(3)->create();
        Post::factory(30)->create();
        Tags::factory(15)->create();
    }
}
