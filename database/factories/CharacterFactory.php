<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, 
            'birthday' => $this->faker->date('Y-m-d'), 
            'occupations' => json_encode(["key" => "5"] ), 
            'img' => $this->faker->imageUrl(400, 400),
            'nickname' => $this->faker->slug, 
            'portrayed' => ""
        ];
    }
}
