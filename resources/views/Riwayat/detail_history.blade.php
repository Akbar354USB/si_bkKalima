@extends('backend.master')

@section('content')

@if(session('success'))
<div class="alert alert-dismissible alert-success">
  <button class="close" type="button" data-dismiss="alert">×</button><strong>  {{ session('success') }}</strong>
</div>
@endif

  <div class="tile">
    <h3 class="tile-title">Data Riwayat Pelanggaran</h3>
    <table class="table">
      <thead>
        <tr align="center">
          <th>No</th>
          <th>Kode Riwayat</th>
          <th>Nama siswa</th>
          <th>Kelas</th>
          <th>Kode Pelanggaran</th>
          <th>Pelanggaran</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($riwayats as $key => $item)
        <tr>
          <td align="center">{{ $key+1 }}</td>
          <td align="center">{{ $item->kode_riwayat }}</td>
          <td align="center">{{ $item->siswa }}</td>
          <td align="center">{{ $item->kelas }}</td>
          <td align="center">{{ $item->kode_tatib }}</td>
          <td align="center">{{ $item->nama_tatib }}</td>
          <td align="center">
            <form action="{{ route('riwayat-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    {{-- <a class="btn btn-primary ml-3" href="{{ route('postSanksi') }}">+ Buat Laporan Sanksi</a> --}}
    {{-- <form action="{{ route('postSanksi', $riwayats->id) }}" method="post" style="display: inline" class="form-check-inline">
      @csrf
      <button class="btn btn-primary" type="submit">+ Buat Laporan Sanksi</i></button>
  </form> --}}
  <form action="{{ route('postSanksi',['siswa_id' => $siswa->id]) }}" method="post" style="display: inline" class="form-check-inline">
    @csrf
    <button class="btn btn-primary" type="submit">+ Buat Laporan Sanksi</i></button>
</form>
  </div>
@endsection
