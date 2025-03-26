<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobAttributeValue>
 */
class JobAttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attribute = Attribute::inRandomOrder()->first();
        return [
            'job_id' => Job::inRandomOrder()->first()->id,
            'attribute_id' => $attribute->id,
            'value' => $this->generateRandomValue($attribute),
        ];
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
