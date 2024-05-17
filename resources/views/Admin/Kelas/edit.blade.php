@extends('backend.master')

@section('content')
<div class="tile">
    <form action="{{ route('kelas-update', $kelas->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
        <label for="exampleInputEmail1">Kode Kelas</label>
        <input class="form-control" name="kode_kelas" value="{{ $kelas->kode_kelas }}">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Nama Kelas</label>
        <input class="form-control" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection