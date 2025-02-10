<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RitualText;

class RitualTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RitualText::create([
            'title' => 'Bài cúng tổ tiên',
            'content' => 'Nội dung bài cúng tổ tiên...',
        ]);
    }
}
