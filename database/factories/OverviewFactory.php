<?php

namespace Database\Factories;

use App\Models\Overview;
use App\Models\Candidate;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class OverviewFactory extends Factory
{
    protected $model = Overview::class;

    public function definition()
    {
        return [
            'candidate_id'     => Candidate::factory(),
            'location'      => $this->faker->address, // If you have a Location factory
            'name'             => $this->faker->name,
            'refer_number'     => $this->faker->numerify('REF-###'),
            'current_job'      => $this->faker->jobTitle,
            'experience_year'  => $this->faker->numberBetween(1, 15),
            'qualification'    => $this->faker->sentence,
            'work_preference'  => $this->faker->word,
            'linkedin_profile' => $this->faker->url,
            'rating'           => (string) $this->faker->numberBetween(1, 5),
        ];
    }
}
