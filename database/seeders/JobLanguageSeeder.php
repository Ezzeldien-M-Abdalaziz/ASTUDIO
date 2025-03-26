<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::all();
        $languages = Language::all();

        $jobs->each(function ($job) use ($languages) {
            $job->languages()->attach($languages->random(rand(1, 50))->pluck('id')->toArray());
        });
    }
}
