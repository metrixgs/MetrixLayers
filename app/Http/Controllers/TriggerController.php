<?php

namespace App\Http\Controllers;

use App\Models\Trigger;
use Illuminate\Http\Request;

class TriggerController extends Controller
{
    public function index()
    {
        $data = Trigger::all();
        return response()->json($data);
    }

    public function show($gid)
    {
        $data = Trigger::find($gid);
        if (!$data) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($data);
    }
}