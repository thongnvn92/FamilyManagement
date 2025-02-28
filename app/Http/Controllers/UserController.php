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
        $availableUsers = $this->getAvailableUsers($user->id ?? null);
        return view('users.detail.show', compact(['member', 'availableUsers']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:male,female',
            'partner_id' => 'nullable|exists:users,id',
            'father_id' => 'nullable|exists:users,id',
            'mother_id' => 'nullable|exists:users,id',
        ]);

        // Tạo User mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Thêm dữ liệu vào bảng family_trees
        FamilyTree::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'gender' => $request->gender,
            'father_id' => $request->father_id,
            'mother_id' => $request->mother_id,
            'partner_id' => $request->partner_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Thêm user thành công!');
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'gender' => 'required|in:male,female',
            'partner_id' => 'nullable|exists:users,id',
            'father_id' => 'nullable|exists:users,id',
            'mother_id' => 'nullable|exists:users,id',
        ]);

        // Cập nhật User
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Cập nhật FamilyTree
        $familyTree = FamilyTree::where('user_id', $user->id)->first();
        if ($familyTree) {
            $familyTree->update([
                'name' => $user->name,
                'gender' => $request->gender,
                'father_id' => $request->father_id,
                'mother_id' => $request->mother_id,
                'partner_id' => $request->partner_id,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Cập nhật user thành công!');
    }

    public function getAvailableUsers($currentUserId = null)
    {
        // Lấy danh sách user chưa có quan hệ gia đình
        $usedUserIds = FamilyTree::pluck('user_id')->toArray();

        // Nếu đang chỉnh sửa user, bỏ qua user đó
        if ($currentUserId) {
            $usedUserIds = array_diff($usedUserIds, [$currentUserId]);
        }

        return User::whereNotIn('id', $usedUserIds)->get();
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Xóa thành công!']);
    }
}
