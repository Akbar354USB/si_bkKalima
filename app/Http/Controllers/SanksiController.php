<?php

namespace App\Http\Controllers;

use App\Models\sanksi;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    public function index(){
        $sanksi = sanksi::paginate(15);
        
        return view('Admin.Sanksi.index', compact('sanksi'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_sanksi' => 'required',
            'sanksi' => 'required',
        ],[
            'kode_sanksi.required' => 'kode sanksi belum di masukkan',
            'sanksi.required' => 'sanksi belum di masukkan',
        ]);

        sanksi::create($request->all());
        return redirect()->route('sanksi-index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id){
        $sanksi = sanksi::where("id", $id)->first();
        $sanksi->delete();

        return redirect()->route('sanksi-index')->with('success', 'Data berhasil dihapus!');
    }
}
