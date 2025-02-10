<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FamilyTree;
use App\Models\User;

class FamilyTreeSeeder extends Seeder
{
    public function run() {
        $users = User::pluck('id')->toArray(); // Lấy danh sách user_id

        if (empty($users)) {
            $users = [User::factory()->create()->id];
        }

        $familyData = [
            ['user_id' => $users[0], 'name' => 'King George VI', 'gender' => 'male', 'partner_id' => $users[1], 'image_url' => 'https://cdn.balkan.app/shared/f1.png'],
            ['user_id' => $users[1], 'name' => 'Queen Elizabeth', 'gender' => 'female', 'partner_id' => $users[0], 'image_url' => 'https://cdn.balkan.app/shared/f2.png'],
            ['user_id' => $users[2], 'name' => 'Queen Elizabeth II', 'gender' => 'female', 'father_id' => $users[0], 'mother_id' => $users[1], 'partner_id' => $users[3], 'image_url' => 'https://cdn.balkan.app/shared/f5.png'],
            ['user_id' => $users[3], 'name' => 'Prince Philip', 'gender' => 'male', 'partner_id' => $users[2], 'image_url' => 'https://cdn.balkan.app/shared/f3.png'],
            ['user_id' => $users[4], 'name' => 'Princess Margaret', 'gender' => 'female', 'father_id' => $users[0], 'mother_id' => $users[1], 'image_url' => 'https://cdn.balkan.app/shared/f6.png'],
            ['user_id' => $users[5], 'name' => 'Prince Charles', 'gender' => 'male', 'father_id' => $users[3], 'mother_id' => $users[2], 'partner_id' => $users[4], 'partner_id' => $users[6], 'image_url' => 'https://cdn.balkan.app/shared/f8.png'],
            ['user_id' => $users[6], 'name' => 'Diana', 'gender' => 'female', 'partner_id' => $users[5], 'image_url' => 'https://cdn.balkan.app/shared/f9.png'],
        ];

        foreach ($familyData as $member) {
            FamilyTree::create($member);
        }
    }
}
