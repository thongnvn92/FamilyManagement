<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemorialNotification;
use App\Models\User;
use App\Models\FamilyTree;

class MemorialNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $familyMember = FamilyTree::first();

        if ($user && $familyMember) {
            MemorialNotification::create([
                'user_id' => $user->id,
                'family_member_id' => $familyMember->id,
                'memorial_date' => '2025-06-01',
                'email_sent' => false,
            ]);
        }
    }
}
