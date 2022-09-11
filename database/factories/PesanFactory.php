<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesan>
 */
class PesanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pesan' => $this->faker->sentence(mt_rand(3,6)),
            'user_id' => mt_rand(1,5),
            'reply_id' => mt_rand(1,5),
            'username' => $this->faker->sentence(1),
            'name' => $this->faker->name()
        ];
    }
}
