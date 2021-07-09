<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

class WisataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getWisata','getWisataById']]);
    }

    public function getWisata() {
        return response()->json(Wisata::all(), 200);
    }

    public function getWisataById($id) {
        $wisata = Wisata::find($id);
        if(is_null($wisata)) {
            return response()->json(['message' => 'Wisata Not Found'], 404);
        }
        return response()->json($wisata::find($id), 200);
    }

    public function addWisata(Request $request) {
        $wisata = Wisata::create($request->all());
        return response($wisata, 201);
    }

    public function updateWisata(Request $request, $id) {
        $wisata = Wisata::find($id);
        if(is_null($wisata)) {
            return response()->json(['message' => 'Wisata Not Found'], 404);
        }
        $wisata->update($request->all());
        return response($wisata, 200);
    }

    public function deleteWisata(Request $request, $id) {
        $wisata = Wisata::find($id);
        if(is_null($wisata)) {
            return response()->json(['message' => 'Wisata Not Found'], 404);
        }
        $wisata->delete();
        return response()->json(['message' => 'Successfully Delete']);
    }
}
