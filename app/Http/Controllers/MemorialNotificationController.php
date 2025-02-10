<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemorialNotification;

class MemorialNotificationController extends Controller
{
    public function index() {
        $notifications = MemorialNotification::all();
        return response()->json($notifications);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'family_member_id' => 'required|exists:family_tree,id',
            'memorial_date' => 'required|date',
        ]);

        $notification = MemorialNotification::create($request->all());
        return response()->json($notification, 201);
    }
}
