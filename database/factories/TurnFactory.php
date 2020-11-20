<?php

namespace Database\Factories;

use App\Models\Turn;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->date,
            'time'=>$this->faker->time,
            'done'=>$this->faker->boolean('false'),
            'client_id'=> Client::factory()->create(),
            'user_id'=> User::factory()->create(),
        ];
    }
}
