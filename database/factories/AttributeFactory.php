<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['text', 'number', 'boolean', 'date', 'select'];

        $type = $this->faker->randomElement($types);

        $options = $type === 'select' ? json_encode($this->faker->words(5)) : null;

        return [
            'name' => $this->faker->word(),
            'type' => $type,
            'options' => $options,
        ];
    }
}
