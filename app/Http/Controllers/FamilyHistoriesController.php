<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyHistoriesController extends Controller
{
    public function index() {
        return view('family-history.index');
    }
}
