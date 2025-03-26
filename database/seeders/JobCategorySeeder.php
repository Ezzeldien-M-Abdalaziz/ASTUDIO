<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::all();
        $categories = Category::all();

        $jobs->each(function ($job) use ($categories) {
            $job->categories()->attach($categories->random(rand(1, 50))->pluck('id')->toArray());
        });
    }
}
