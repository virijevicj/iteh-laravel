<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word(),
            'ISBN'=>$this->faker->regexify('([1-9][1-9][1-9][1-9]-){4}'),
            'year_of_publication'=>$this->faker->year(),
            'grade'=>$this->faker->numberBetween(1,10),
            'autor_id'=>$this->faker->numberBetween(1,3),
            'genre_id'=>$this->faker->numberBetween(1,5),
            'user_id'=>User::factory()
        ];
    }
}
