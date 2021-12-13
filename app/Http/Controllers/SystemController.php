<?php

namespace App\Http\Controllers;

use App\Models\Unit;
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
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_id' => 'required|integer',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required',
            'observation' => 'required|max:255',
            'children' => 'required|boolean',
        ]);


        System::insert([
            'unit_id' => $validated['unit_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'observation' => $validated['observation'],
            'children' => $validated['children'],
        ]);
    }

    public function show(System $system)
    {
        return $system;
    }
}
