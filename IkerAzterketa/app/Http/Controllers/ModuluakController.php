<?php

namespace App\Http\Controllers;

use App\Models\Moduluak;
use Illuminate\Http\Request;

class ModuluakController extends Controller
{
    public function index()
    {
        $moduluak = Moduluak::all();
        return response()->json($moduluak);
    }

    public function show($id)
    {
        $moduluak = Moduluak::find($id);

        if (!$moduluak) {
            return response()->json(['message' => 'Modulua ez da aurkitu'], 404);
        }

        return response()->json($moduluak);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'izena' => 'required|string|max:255',
            'gela' => 'required|date',
        ]);

        $moduluak = Moduluak::create($validatedData);

        return response()->json([
            'message' => 'Modulua ondo sortu da',
            'moduluak' => $moduluak
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $moduluak = Moduluak::find($id);

        if (!$moduluak) {
            return response()->json(['message' => 'Modulua ez da aurkitu'], 404);
        }

        $validatedData = $request->validate([
            'izena' => 'required|string|max:255',
            'gela' => 'required|date',
        ]);

        $moduluak->update($validatedData);

        return response()->json([
            'message' => 'Modulua aldatu da',
            'moduluak' => $moduluak
        ]);
    }

    public function destroy($id)
    {
        $moduluak = Moduluak::find($id);

        if (!$moduluak) {
            return response()->json(['message' => 'Modulua ez da aurkitu'], 404);
        }

        $moduluak->delete();

        return response()->json([
            'message' => 'Modulua ezabatu da'
        ]);
    }
}
