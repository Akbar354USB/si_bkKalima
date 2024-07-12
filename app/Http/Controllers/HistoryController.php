<?php

namespace App\Http\Controllers;

use App\Models\ClasStudent;
use App\Models\History;
use App\Models\Laporantest;
use App\Models\sanksi;
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

    public function detailhistory($siswa_id, $id){
        $riwayats = DB::table('histories')
                    ->join('students', 'histories.siswa_id', '=', 'students.id')
                    ->join('tatibs', 'histories.tatib_id', '=', 'tatibs.id')
                    ->join('clas_students', 'students.kelas_id', '=', 'clas_students.id')
                    ->select('histories.*' , 'students.nama as siswa', 'clas_students.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.nama_tatib as nama_tatib', 'histories.kode_riwayat')
                    ->where('histories.siswa_id',$siswa_id)
                    ->get();


        $siswa = Student::findOrFail($id);
        $siswa->get();
        // dd($siswa_id);
        return view('Riwayat.detail_history', compact('riwayats','siswa'));
    }

    public function postSanksi($siswa_id){
        $riwayatPelanggaran = DB::table('histories')
        ->join('students', 'histories.siswa_id', '=', 'students.id')
        ->join('tatibs', 'histories.tatib_id', '=', 'tatibs.id')
        ->select('students.id as siswa_id', 'students.nama', 'tatibs.kode_tatib', 'tatibs.nama_tatib')
        ->where('students.id', $siswa_id)
        ->get()
        ->groupBy('siswa_id');

        // $siswa = Student::findOrFail($id);
        // $siswa->get();

        foreach ($riwayatPelanggaran as $riwayat) {

            $kode_tatib = $riwayat->pluck('kode_tatib')->toArray();
            $nama_tatib = $riwayat->pluck('nama_tatib');
            $nama_siswa = $riwayat->pluck('nama')->first();

            // $riwayats = History::all();
            $data_sanksi = sanksi::all();
            // $kode_sanksi = "";
            $nama_sanksi = "";


            if (in_array('AP1', $kode_tatib) && in_array('AP2', $kode_tatib)) {
                // $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S3')->kode_sanksi;
                $nama_sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S4')->sanksi;
            } elseif (in_array('AP1', $kode_tatib)) {
                // $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S1')->kode_sanksi;
                $nama_sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S1')->sanksi;
            } elseif (in_array('AP2', $kode_tatib)) {
                // $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S2')->kode_sanksi;
                $nama_sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S2')->sanksi;
            } elseif (in_array('AP3', $kode_tatib)) {
                // $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S2')->kode_sanksi;
                $nama_sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S3')->sanksi;
            }

            $laporan = new Laporantest();
            $laporan->nama_siswa = $nama_siswa;
            $laporan->catatan_pelanggaran = $nama_tatib;
            $laporan->sanksi = $nama_sanksi;
            $laporan->save();

            dd($laporan);
        }
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

        return redirect()->route('riwayat-count')->with('success', 'Data berhasil ditambahkan! Silahkan Cek Pada Detail Untuk Melihat Data Riwayat Pelanggaran Siswa');
    }

    public function destroy($id){
        $riwayat = History::findOrFail($id);
        $riwayat->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
