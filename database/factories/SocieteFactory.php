<?php

namespace Database\Factories; // Ajoute ce namespace

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Societe;

class SocieteFactory extends Factory
{
    protected $model = Societe::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company(),
             'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
         ];
    }
}
