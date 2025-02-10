<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index() {
        $announcements = Announcement::all();
        return response()->json($announcements);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $announcement = Announcement::create($request->all());
        return response()->json($announcement, 201);
    }
}
