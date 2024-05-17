<?php

namespace App\Http\Controllers;

use App\Models\ClasStudent;
use Illuminate\Http\Request;

class ClasStudentController extends Controller
{
    public function index(){
        $kelas = ClasStudent::all();
        
        return view('Admin.Kelas.index', compact('kelas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
        ],[
            'kode_kelas.required' => 'kode kelas belum di masukkan',
            'nama_kelas.required' => 'nama kelas belum di masukkan'
        ]);

        ClasStudent::create($request->all());
        return redirect()->route('kelas-index');
    }
        public function edit($id){
       $kelas = ClasStudent::where("id", $id)->first();

       return view('Admin.Kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id){
        $kelas = ClasStudent::where("id", $id)->first();
        $kelas->update($request->all());

        return redirect()->route('kelas-index');
    }

    public function destroy($id){
        $kelas = ClasStudent::where("id", $id)->first();
        $kelas->delete();

        return redirect()->route('kelas-index');
    }
}
