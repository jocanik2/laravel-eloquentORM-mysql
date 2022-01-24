<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = Author::pluck('author_id')->toArray();
        return [
            'name' => $this->faker->sentence(nbWords:5),
            'publisher' => $this->faker->company(),
            'short_description' => $this->faker->text(),
            'year_out'=>$this->faker->year(),
            'author_id'=>$this->faker->randomElement($users)



        ];
    }
}
