@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Lapor Pelanggaran</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="NAMA SISWA" name="kode_kelas">
          @error('kode_kelas')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="LAPORAN PELANGGARAN" rows="4" name="kode_kelas"></textarea>
            @error('kode_kelas')
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
            {{-- @foreach ($kelas as $item) --}}
            <option value=""></option>
            {{-- @endforeach --}}
            </select>
            @error('kelas_id')
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
<div class="tile">
    <h3 class="tile-title">Data Laporan Pelanggaran</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama siswa</th>
          <th>Kelas</th>
          <th>Keterangan</th>
          <th>Pelapor</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
        {{-- @foreach ($kelas as $key => $item) --}}
        <tr>
          <td>1</td>
          <td>bre</td>
          <td>10</td>
          <td>bolos</td>
          <td>jumain</td>
          <td>
            <a class="btn btn-primary" href="" ><i class="fa fa-lg fa-edit"></i></a>
            <form action="" method="post" style="display: inline" class="form-check-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
            </form>
          </td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
@endsection