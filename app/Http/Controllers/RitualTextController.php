<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RitualText;

class RitualTextController extends Controller
{
    public function index()
    {
        $texts = RitualText::all();
        return view('ritual_texts.index', compact('texts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $text = RitualText::create($request->all());

        return response()->json(['message' => 'Thêm thành công!', 'text' => $text]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $text = RitualText::findOrFail($id);
        $text->update($request->all());

        return response()->json(['message' => 'Cập nhật thành công!', 'text' => $text]);
    }

    public function destroy($id)
    {
        $text = RitualText::findOrFail($id);
        $text->delete();

        return response()->json(['message' => 'Xóa thành công!']);
    }
}
