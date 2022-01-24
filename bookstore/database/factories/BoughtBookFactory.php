<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoughtBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $books = Book::pluck('book_id')->toArray();
        return [
            'id'=>$this->faker->randomElement($users),
            'book_id'=>$this->faker->randomElement($books)
           
        ];
    }
}
