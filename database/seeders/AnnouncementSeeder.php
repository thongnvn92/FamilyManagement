<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'title' => 'Thông báo lễ giỗ cụ tổ',
            'content' => 'Lễ giỗ cụ tổ sẽ diễn ra vào ngày 10/10 âm lịch. Kính mời toàn thể gia đình tham dự.',
        ]);
    }
}
