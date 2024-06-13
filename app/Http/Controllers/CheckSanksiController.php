<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\sanksi;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckSanksiController extends Controller
{
    public function testing(){
        // $siswa = History::where('siswa_id', '7')->get();
        // $pelanggaran = History::select('tatib_id')->where($siswa)->get();
        // $pelanggaran = DB::table('histories')->select('tatib_id')->get();
        // return view('tester', compact('siswa'));

        // $pelanggaran = History::where('siswa_id', '7')->pluck('tatib_id');

        

        $riwayatPelanggaran = DB::table('histories')
        ->join('students', 'histories.siswa_id', '=', 'students.id')
        ->join('tatibs', 'histories.tatib_id', '=', 'tatibs.id')
        ->select('students.id', 'students.nama', 'tatibs.kode_tatib')
        ->get()
        ->groupBy('id');
        
        foreach ($riwayatPelanggaran as $riwayat) {

            $kode_tatib = $riwayat->pluck('kode_tatib')->toArray();

            $riwayats = History::all();
            $data_sanksi = sanksi::all();
            $sanksi = "";

            // $idSiswa = $riwayat->siswa_id;
            // Ambil id_pelanggaran siswa
            // $pelanggaran = History::where('siswa_id', $idSiswa)->pluck('tatib_id')->toArray();

            if (in_array('AP1', $kode_tatib) && in_array('AP2', $kode_tatib)) {
                $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S3')->kode_sanksi;
            } elseif (in_array('AP1', $kode_tatib)) {
                $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S1')->kode_sanksi;
            } elseif (in_array('AP2', $kode_tatib)) {
                $sanksi = $data_sanksi -> firstWhere('kode_sanksi', 'S2')->kode_sanksi;
            }
        }
        return response()->json($sanksi);
    }

    // public function insertLaporan()
    // {
    //     $riwayatPelanggaran = DB::table('histories')
    //         ->join('students', 'histories.siswa_id', '=', 'students.id')
    //         ->join('tatibs', 'histories.tatib_id', '=', 'tatibs.id')
    //         ->select('students.id', 'students.nama', 'tatibs.nama_tatib')
    //         ->get()
    //         ->groupBy('id');

    //     // $sanksiData = DB::table('sanksis')->get();
    //     $sanksiData = sanksi::all();

    //     foreach ($riwayatPelanggaran as $id => $pelanggaran) {
    //         $catatanPelanggaran = $pelanggaran->pluck('nama_tatib')->implode(', ');

    //         $sanksi = '';
    //         $tatibNames = $pelanggaran->pluck('nama_tatib')->toArray();

    //         if (in_array('ap1', $tatibNames) && in_array('ap2', $tatibNames)) {
    //             $sanksi = $sanksiData->firstWhere('sanksi', 's3')->sanksi;
    //         } elseif (in_array('ap1', $tatibNames)) {
    //             $sanksi = $sanksiData->firstWhere('sanksi', 's1')->sanksi;
    //         } elseif (in_array('ap2', $tatibNames)) {
    //             $sanksi = $sanksiData->firstWhere('sanksi', 's2')->sanksi;
    //         }

    //         DB::table('laporan_akhir')->insert([
    //             'catatan_pelanggaran' => $catatanPelanggaran,
    //             'sanksi' => $sanksi,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return response()->json($sanksi);
    // }


}
