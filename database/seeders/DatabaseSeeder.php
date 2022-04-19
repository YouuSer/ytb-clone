<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@younes.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(5)->create();

        // DB::table('videos')->insert([
        //     'title' => 'Mer',
        //     'path' => '/videos/8lUQoWxWkiP66LBeQcjJ9WPUqwT3BlJ743zKIQOy.mp4',
        //     'user_id' => 2,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('videos')->insert([
        //     'title' => 'Plage',
        //     'path' => '/videos/wV4r0n0hmCkR6KssWVfVPelPKkiif8m5QhQVD9lG.mp4',
        //     'user_id' => 3,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('videos')->insert([
        //     'title' => 'Desert',
        //     'path' => '/videos/kBHzA9OjV4AgFjCwpSPFPoWzXxZt88kh5FSeThUN.mp4',
        //     'user_id' => 4,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // DB::table('videos')->insert([
        //     'title' => 'Volcan',
        //     'path' => '/videos/ZrV0PqHBrBDogKe4CLmf9F4IHjsPQ2LFHhoMFTep.mp4',
        //     'user_id' => 5,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // \App\Models\Comment::factory(10)->create();
    }
}
