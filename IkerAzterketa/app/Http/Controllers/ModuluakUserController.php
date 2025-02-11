<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuluakUserController extends Controller
{
    public function ikaslemoduluak(Request $request){
        $validatedData = $request->validate([
            'modulua_id' => 'required|exists:moduluaks,id', 
        ]);

        $modulua_id = $validatedData['modulua_id'];

        $user = $request->user();

        if ($user->teacher === 1) {
            
            return response()->json(['message' => 'Modulora ikasleak sartu daitezke bakarrik.'], 403);
        }



        if ($user->moduluak()->where('modulua_id', $modulua_id)->exists()) {
            return response()->json(['message' => ' Erregistroa ondo .'], 
            400);
        }



        $user->moduluak()->attach($modulua_id);

        return response()->json([
            
            'message' => 'Modulora ondo sartuta.',
            'modulua_id' => $modulua_id
        ], 200);
    }
}
