<?php

namespace App\Http\Controllers;

use App\Models\ClasStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $siswa = Student::with("kelas")->paginate(5);

        // $siswa = Siswa::with("kelas")->paginate(5)
        $kelas = ClasStudent::all();
        
        return view('Admin.Siswa.index', compact('siswa','kelas'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
        ],[
            'nis.required' => 'nis belum di masukkan',
            'nama.required' => 'nama siswa belum di masukkan',
            'jenis_kelamin.required' => 'jenis kelamin belum di masukkan',
            'alamat.required' => 'alamat belum di masukkan',
            'kelas_id.required' => 'kelas belum di masukkan'
        ]);

        Student::create($request->all());
        return redirect()->route('siswa-index');
    }

        public function edit($id){
    $siswa = Student::where("id", $id)->first();
    $kelas = ClasStudent::all();

       return view('Admin.Siswa.edit', compact('siswa','kelas'));
    }

    public function update(Request $request, $id){
        $siswa = Student::where("id", $id)->first();
        $siswa->update($request->all());

        return redirect()->route('siswa-index');
    }

    public function destroy($id){
        $siswa = Student::where("id", $id)->first();
        $siswa->delete();

        return redirect()->route('siswa-index');
    }
}
