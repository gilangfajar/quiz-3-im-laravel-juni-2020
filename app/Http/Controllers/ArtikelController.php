<?php

namespace App\Http\Controllers;
use App\Models\ArtikelModel;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function index() {
        $artikels = ArtikelModel::get_all();
        return view('data-artikels.index', compact('artikels'));
    }

    public function create() {
        return view('data-artikels.form');
    }
    public function store(Request $request) {
        //dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        $artikels = ArtikelModel::save($data);
        // dd($pertanyaan);
        if($artikels) {
            return redirect('/artikel');
        }
    }

    public function show($id) {
        $artikels = ArtikelModel::find_by_id($id);
        

        return view('data-artikels.detail_artikel', compact('artikel'));
    }
}
