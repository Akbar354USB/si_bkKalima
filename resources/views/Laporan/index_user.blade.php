@extends('backend.master')

@section('content')
{{-- card kedua --}}
<div class="tile">
    <h3 class="tile-title">Data Laporan Pelanggaran</h3>
    <table class="table">
    <tbody>
        <tr>
            <th width="30%">Nama Siswa </th>
            <td width="5%">:</td>
            <td width="65%">{{ $laporan->nama_siswa }}</td>
        </tr>
        <tr>
            <th>Kelas Siswa</th>
            <td>:</td>
            <td>{{ $laporan->kelas->kode_kelas }}</td>
        </tr>
        <tr>
            <th>Pelanggaran</th>
            <td>:</td>
            <td>{{ $laporan->pelanggaran }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>:</td>
            <td>{{ $laporan->keterangan }}</td>
        </tr>
        <tr>
            <th>Tanggal di buat</th>
            <td>:</td>
            <td>{{ $laporan->created_at }}</td>
        </tr>
    </tbody>
    </table>
    <div class="text-right mr-5"><h4>TTD</h4></div>
    <div class="text-right mr-5"><h6>{{ $laporan->pelapor }}</h6></div>
    <h6>Data Laporan Pelanggaran <span class="text-primary">BERHASIL</span> di tambahkan.</h6>
    <a  class="btn btn-primary" href="{{ route('laporan-create') }}">Kembali</a>
  </div>
@endsection