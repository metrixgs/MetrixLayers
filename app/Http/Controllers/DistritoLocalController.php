<?php

namespace App\Http\Controllers;

use App\Models\DistritoLocal;
use Illuminate\Http\Request;

class DistritoLocalController extends Controller
{
    public function index()
    {
        $data = DistritoLocal::all();
        return response()->json($data);
    }

    public function show($gid)
    {
        $data = DistritoLocal::find($gid);
        if (!$data) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($data);
    }
}