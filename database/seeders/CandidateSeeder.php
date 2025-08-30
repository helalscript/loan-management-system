<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Overview;
use App\Models\ProProfile;
use App\Models\Experience;
use App\Models\Qualification;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        Candidate::factory()
            ->count(20) // create 20 candidates
            ->create()
            ->each(function ($candidate) {
                Overview::factory()->create(['candidate_id' => $candidate->id]);
                ProProfile::factory()->create(['candidate_id' => $candidate->id]);
                Experience::factory()->count(2)->create(['candidate_id' => $candidate->id]);
                Qualification::factory()->count(2)->create(['candidate_id' => $candidate->id]);
            });
    }
}
