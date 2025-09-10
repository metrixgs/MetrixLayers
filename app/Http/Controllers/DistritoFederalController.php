<?php

namespace App\Http\Controllers;

use App\Models\DistritoFederal;
use Illuminate\Http\Request;

class DistritoFederalController extends Controller
{
    public function index()
    {
        $data = DistritoFederal::all();
        return response()->json($data);
    }

    public function show($gid)
    {
        $data = DistritoFederal::find($gid);
        if (!$data) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($data);
    }
}