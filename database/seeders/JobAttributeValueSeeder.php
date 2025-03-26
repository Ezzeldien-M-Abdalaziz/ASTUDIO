<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Job;
use App\Models\JobAttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::all();
        $attributes = Attribute::all();

        $jobs->each(function ($job) use ($attributes) {
            $attributes->each(function ($attribute) use ($job) {
                JobAttributeValue::create([
                    'job_id' => $job->id,
                    'attribute_id' => $attribute->id,
                    'value' => $this->generateRandomValue($attribute),
                ]);
            });
        });
    }

    private function generateRandomValue($attribute)
    {
        switch ($attribute->type) {
            case 'text':
                return fake()->word();
            case 'number':
                return fake()->numberBetween(1, 100);
            case 'boolean':
                return fake()->boolean();
            case 'date':
                return fake()->date();
            case 'select':
                $options = json_decode($attribute->options, true);
                return $options ? fake()->randomElement($options) : null;
            default:
                return null;
        }

    }
}
