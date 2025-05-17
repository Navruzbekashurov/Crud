<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\BranchPhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BranchPhoneNumberFactory extends Factory
{
    protected $model = BranchPhoneNumber::class;

    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'branch_id' => Branch::factory(),
        ];
    }
}
