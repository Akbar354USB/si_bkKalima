<?php

namespace App\Http\Controllers;

use App\Models\ClasStudent;
use App\Models\History;
use App\Models\Student;
use App\Models\Tatib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    // public function index(){
    //     $tatib = Tatib::all();
    //     $siswa = Student::all();
    //     $kelas = ClasStudent::all();
    //     $riwayat = History::all();
    //     return view('Riwayat.index', compact('siswa', 'tatib','riwayat','kelas'));
    // }

    public function selectcounthistory(){
        $riwayat = DB::table('histories')
                    ->join('students', 'histories.siswa_id', '=', 'students.id')
                    ->select('students.nama as siswa', DB::raw('COUNT(histories.id) as jumlah_pelanggaran'))
                    ->groupBy('students.nama')
                    ->get();
        
        return view('Riwayat.index', compact('riwayat'));
    }
    

    public function selectsiswa(){
        $data = Student::where('nama','LIKE','%'.request('q').'%')->paginate(10);
        return response()->json($data);
    }

    public function selecttatib(){
        $data = Tatib::where('nama_tatib','LIKE','%'.request('q').'%')->paginate(5);
        return response()->json($data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_riwayat' => 'required',
            'siswa_id' => 'required',
            'tatib_id' => 'required',
        ],[
            'kode_riwayat.required' => 'kode riwayat belum di masukkan',
            'siswa_id.required' => 'nama siswa belum di masukkan',
            'tatib_id.required' => 'tatib belum di masukkan'
        ]);

        History::create($request->all());

        return redirect()->route('riwayat-index');
    }
    //     public function edit($id){
    //    $kelas = ClasStudent::where("id", $id)->first();

    //    return view('Admin.Kelas.edit', compact('kelas'));
    // }

    // public function update(Request $request, $id){
    //     $kelas = ClasStudent::where("id", $id)->first();
    //     $kelas->update($request->all());

    //     return redirect()->route('kelas-index');
    // }

    public function destroy($id){
        $riwayat = History::where("id", $id)->first();
        $riwayat->delete();

        return redirect()->route('riwayat-index');
    }
}
