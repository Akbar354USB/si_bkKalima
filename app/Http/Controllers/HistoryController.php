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
                    ->join('clas_students', 'students.kelas_id', '=', 'clas_students.id')
                    ->select('students.id as siswa_id','students.nama as siswa', 'clas_students.kode_kelas as kelas', DB::raw('COUNT(histories.id) as jumlah_pelanggaran'))
                    ->groupBy('students.id','students.nama', 'clas_students.kode_kelas')
                    ->get();
        
        return view('Riwayat.index', compact('riwayat'));
    }

    public function detailhistory($siswa_id){
        $riwayats = DB::table('histories')
                    ->join('students', 'histories.siswa_id', '=', 'students.id')
                    ->join('tatibs', 'histories.tatib_id', '=', 'tatibs.id')
                    ->join('clas_students', 'students.kelas_id', '=', 'clas_students.id')
                    ->select('histories.*' , 'students.nama as siswa', 'clas_students.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.nama_tatib as nama_tatib', 'histories.kode_riwayat')
                    ->where('histories.siswa_id',$siswa_id)
                    ->get();
        
        return view('Riwayat.detail_history', compact('riwayats'));
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

        return redirect()->route('riwayat-count');
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
        $riwayat = History::findOrFail($id);
        $riwayat->delete();

        return redirect()->back();
    }
}
