<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FamilyTree;

class FamilyTreeFactory extends Factory
{
    protected $model = FamilyTree::class;

    public function definition() {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'image_url' => 'https://cdn.balkan.app/shared/f1.png',
            'father_id' => null,
            'mother_id' => null,
            'partner_id' => null
        ];
    }
}
