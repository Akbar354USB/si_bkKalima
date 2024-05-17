@extends('backend.master')

@section('content')
<div class="tile">
    <form action="{{ route('siswa-update', $siswa->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
        <label>NIs</label>
        <input class="form-control" name="nis" value="{{ $siswa->nis }}">
        </div>
        <div class="form-group">
        <label>Nama Siswa</label>
        <input class="form-control" name="nama" value="{{ $siswa->nama }}">
        </div>

        <div class="form-group">
            <select class="form-control" name="kelas_id" id="">
              <option label="Pilih Kelas"></option>
              @foreach ($kelas as $item)
              <option @if ($siswa->kelas_id == $item->id ) selected @endif value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
              @endforeach
            </select>
          </div>

        <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" name="alamat" value="{{ $siswa->alamat }}">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection