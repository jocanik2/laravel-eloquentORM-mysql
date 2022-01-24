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
        $users = User::pluck('user_id')->toArray();
        $books = Book::pluck('book_id')->toArray();
        return [
            'user_id'=>$this->faker->randomElement($users),
            'book_id'=>$this->faker->randomElement($books)
           
        ];
    }
}
