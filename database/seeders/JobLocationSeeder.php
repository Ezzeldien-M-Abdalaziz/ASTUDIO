<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::all();
        $locations = Location::all();

        $jobs->each(function ($job) use ($locations) {
            $job->locations()->attach($locations->random(rand(1, 50))->pluck('id')->toArray());
        });
    }
}
