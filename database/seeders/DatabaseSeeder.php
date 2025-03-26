<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JobSeeder::class,
            LanguageSeeder::class,
            LocationSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            JobCategorySeeder::class,
            JobLocationSeeder::class,
            JobLanguageSeeder::class,
            JobAttributeValueSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Ezz',
            'email' => 'ezz@example.com',
        ]);
    }
}
