<?php

namespace Database\Factories;

use App\Models\Qualification;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationFactory extends Factory
{
    protected $model = Qualification::class;

    public function definition()
    {
        return [
            'candidate_id'    => Candidate::factory(),
            'degree'          => $this->faker->word . ' Degree',
            'institution'     => $this->faker->company . ' University',
            'duration'        => $this->faker->date(),
            'graduation_date' => $this->faker->date(),
        ];
    }
}
