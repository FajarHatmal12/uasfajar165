<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perjalanan;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

class PerjalananController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getPerjalanan','getPerjalananById']]);
    }

    public function getPerjalanan() {
        return response()->json(perjalanan::with('wisata')->get(), 200);
    }

    public function getPerjalananById($id) {
        $perjalanan = Perjalanan::find($id);
        if(is_null($perjalanan)) {
            return response()->json(['message' => 'Perjalanan Not Found'], 404);
        }
        return response()->json(perjalanan::with('wisata')->where('id', $id)->first(), 200);
    }

    public function addPerjalanan(Request $request) {
        $perjalanan = Perjalanan::create($request->all());
        return response($perjalanan, 201);
    }

    public function updatePerjalanan(Request $request, $id) {
        $perjalanan = Perjalanan::find($id);
        if(is_null($perjalanan)) {
            return response()->json(['message' => 'Perjalanan Not Found'], 404);
        }
        $perjalanan->update($request->all());
        return response($perjalanan, 200);
    }

    public function deletePerjalanan(Request $request, $id) {
        $perjalanan = Perjalanan::find($id);
        if(is_null($perjalanan)) {
            return response()->json(['message' => 'Perjalanan Not Found'], 404);
        }
        $perjalanan->delete();
        return response()->json(['message' => 'Successfully Delete']);
    }
}