<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'unique_id' => $this->faker->uuid,
            'status'    => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
