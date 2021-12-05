<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index()
    {
        return System::all();
    }

    public function create()
    {
        dd('from create');
        // return view();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required',
            'observation' => 'required|max:255',
            'children' => 'required|boolean',
        ]);

        // 'name' => 'system MacOs',
        // 'description' => 'Very well secure and no infections',
        // 'status' => 'working',
        // 'observation' => 'horribly infected Windows',
        // 'children' => true

        dd($request->toArray());
        // return $;
    }
}
