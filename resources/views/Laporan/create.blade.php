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
@endsection