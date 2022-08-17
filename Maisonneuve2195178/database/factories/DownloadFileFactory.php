<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class DownloadFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        return [
            'title' => $this->faker->Str::random(10),
            'title_fr' => $this->faker->Str::random(10),
            'date' => now(),
            'file_url' => $this->faker->Str::random(10),
            'file_extension' => 'pdf',
            'user_id' => $this->faker->unique()->randomElement($users->lists('id')),
        ];
    }
}
