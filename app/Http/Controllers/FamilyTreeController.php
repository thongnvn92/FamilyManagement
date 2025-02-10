<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyTree;

class FamilyTreeController extends Controller
{
    public function index() {
        $familyMembers = FamilyTree::all();
        return view('family-tree.index', compact('familyMembers'));
    }
}
