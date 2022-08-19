<?php

namespace Database\Seeders;

use Faker\Core\DateTime;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name' => 'Moderator',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_moderator' => 1,
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(20)->create();
        \App\Models\Post::factory(30)->create();
        \App\Models\Message::factory(30)->create();
        \App\Models\Contact::factory(15)->create();
    }
}
