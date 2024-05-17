@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Tambah Data Siswa</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('siswa-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="NIS" name="nis">
          @error('nis')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label class="control-label">JENIS KELAMIN</label>
            <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="LAKI-LAKI">LAKI-LAKI
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="PEREMPUAN">PEREMPUAN
                </label>
            </div>
          @error('jenis_kelamin')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
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
    </div>
    <div class="col-lg-5 offset-lg-1">
        <div class="form-group">
          <input class="form-control" placeholder="NAMA" name="nama">
          @error('nama')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan alamat siswa..."></textarea>
          @error('alamat')
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
    <h3 class="tile-title">Data Siswa</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nis</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siswa as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->nis }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->kelas->nama_kelas }}</td>
          <td>{{ $item->alamat }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('siswa-edit', $item->id) }}" ><i class="fa fa-lg fa-edit"></i></a>
            <form action="{{ route('siswa-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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