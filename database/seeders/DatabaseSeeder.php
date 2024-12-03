<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Remove before prod!
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'fv.webteam@nhs.scot',
            'password' => '$2y$10$Z3XFLPNyce8u5KlaZhNYt.zojYUMfCugJ2BdaD5cOGyJ5P8.6AuPu',
            'is_admin' => true
        ]);

        $this->call([
            UserSeeder::class,
            ConsultantSeeder::class,
            HipSeeder::class,
            KneeSeeder::class,
            ShoulderSeeder::class,
            CommentSeeder::class,
        ]);       

    }
}
