<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyTree;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $member = FamilyTree::with('user')->findOrFail($id);
        return view('users.detail.show', compact('member'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'member',
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Cập nhật thông tin thành viên
    public function update(Request $request, $id)
    {
        $member = FamilyTree::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        // Cập nhật thông tin user
        $user->update([
            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
        ]);

        // Cập nhật thông tin thành viên
        $member->update([
            'name' => $request->input('member_name'),
            'gender' => $request->input('gender'),
            'birth_date' => $request->input('birth_date'),
            'death_date' => $request->input('death_date'),
            'image_url' => $request->input('image_url'),
        ]);

        return redirect()->route('users.detail.show', $id)->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Xóa thành công!']);
    }
}
