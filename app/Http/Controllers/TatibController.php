<?php

namespace App\Http\Controllers;

use App\Models\Tatib;
use Illuminate\Http\Request;

class TatibController extends Controller
{
    public function index(){
        $tatib = Tatib::paginate(10);
        
        return view('Admin.Tatib.index', compact('tatib'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_tatib' => 'required',
            'nama_tatib' => 'required',
            'kategori' => 'required',
        ],[
            'kode_tatib.required' => 'kode kelas belum di masukkan',
            'nama_tatib.required' => 'nama kelas belum di masukkan',
            'kategori.required' => 'nama kelas belum di masukkan',
        ]);

        Tatib::create($request->all());
        return redirect()->route('tatib-index');
    }

    public function destroy($id){
        $tatib = Tatib::where("id", $id)->first();
        $tatib->delete();

        return redirect()->route('tatib-index');
    }
}
