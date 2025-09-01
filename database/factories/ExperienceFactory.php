<?php

namespace Database\Factories;

use App\Models\Experience;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition()
    {
        return [
            'candidate_id'            => Candidate::factory(),
            'start_date' => $this->faker->date(),
            'end_date'   => $this->faker->optional()->date(),
            'role'                    => $this->faker->jobTitle,
            'company'            => $this->faker->company,
            'responsibilities'        => [$this->faker->sentence, $this->faker->sentence],
            'is_currently_working'    => $this->faker->boolean,
            'status'                  => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
