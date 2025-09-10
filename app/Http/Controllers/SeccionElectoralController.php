<?php

namespace App\Http\Controllers;

use App\Models\SeccionElectoral;
use Illuminate\Http\Request;

class SeccionElectoralController extends Controller
{
    public function index()
    {
        $data = SeccionElectoral::all();
        return response()->json($data);
    }

    public function show($gid)
    {
        $data = SeccionElectoral::find($gid);
        if (!$data) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($data);
    }
}