<?php

namespace App\Http\Controllers;

use App\Models\ClasStudent;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create(){
        $kelas = ClasStudent::all();
        
        return view('Laporan.create', compact('kelas'));
    }

    public function index(){
        $laporan = Report::all();
        $kelas = ClasStudent::all();
        
        return view('Laporan.index', compact('laporan','kelas'));
        // return view('Laporan.index');
    }

    public function index_user($id){
        $laporan = Report::where("id", $id)->first();
        $kelas = ClasStudent::all();
        
        return view('Laporan.index_user', compact('laporan','kelas'));
        // return view('Laporan.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_siswa' => 'required',
            'pelanggaran' => 'required',
            'keterangan' => 'required',
            'kelas_id' => 'required',
        ],[
            'nama_siswa.required' => 'nama siswa belum di masukkan',
            'pelanggaran.required' => 'pelanggaran kelas belum di masukkan',
            'keterangan.required' => 'keterangan belum di masukkan',
            'kelas_id.required' => 'kelas siswa belum di masukkan',
        ]);

        $laporan = new Report();
        $laporan->nama_siswa = $request->nama_siswa;
        $laporan->pelanggaran = $request->pelanggaran;
        $laporan->keterangan = $request->keterangan;
        $laporan->pelapor = "ini tes";
        // $laporan->pengirim = auth()->user()->name;
        $laporan->kelas_id = $request->kelas_id;
        $laporan->save();


        return redirect()->route('laporan-index-user',$laporan->id)->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id){
        $laporan1 = Report::where("id", $id)->first();
        $laporan1->delete();

        return redirect()->route('laporan-index')->with('success', 'Data berhasil dihapus!');
    }
}
