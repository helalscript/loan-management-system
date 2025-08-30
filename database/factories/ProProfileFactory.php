<?php

namespace Database\Factories;

use App\Models\ProProfile;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProProfileFactory extends Factory
{
    protected $model = ProProfile::class;

    public function definition()
    {
        return [
            'candidate_id'            => Candidate::factory(),
            'insights'                => $this->faker->paragraph,
            'flexibility'             => $this->faker->paragraph,
            'motivation'              => $this->faker->paragraph,
            'career_goals'          => $this->faker->paragraph,
            'key_strengths'           => [$this->faker->word, $this->faker->word],
            'observations'             => [$this->faker->sentence, $this->faker->sentence],
            'culture_fit' => $this->faker->paragraph,
            'salary_expectations'     => $this->faker->sentence,
            'notice_period'           => $this->faker->word,
            'status'                  => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
