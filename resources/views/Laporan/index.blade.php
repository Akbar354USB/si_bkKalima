@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Lapor Pelanggaran</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('laporan-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="NAMA SISWA" name="nama_siswa">
          @error('nama_siswa')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="PELANGGARAN" name="pelanggaran">
          @error('nama_siswa')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
    </div>
    <div class="col-lg-5 offset-lg-1">
      <div class="form-group">
        <select class="form-control" name="kelas_id" id="">
          <option label="Pilih Kelas"></option>
          @foreach ($kelas as $item)
          <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
          @endforeach
        </select>
        @error('kelas_id')
        <span class="text-danger">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
        <div class="form-group">
          <textarea class="form-control" placeholder="KETERANGAN" rows="4" name="keterangan"></textarea>
          @error('keterangan')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit</button>
  </form>
</div>

{{-- card kedua --}}
@if(session('success'))
<div class="alert alert-dismissible alert-success">
  <button class="close" type="button" data-dismiss="alert">×</button><strong>  {{ session('success') }}</strong>
</div>
@endif

<div class="tile">
    <h3 class="tile-title">Data Laporan Pelanggaran</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama siswa</th>
          <th>Kelas</th>
          <th>Pelanggaran</th>
          <th>Keterangan</th>
          <th>Tanggal Laporan</th>
          <th>Pelapor</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($laporan as $key => $item)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $item->nama_siswa }}</td>
          <td>{{ $item->kelas->kode_kelas }}</td>
          <td>{{ $item->pelanggaran }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->pelapor }}</td>
          <td>
            <form action="{{ route('laporan-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection