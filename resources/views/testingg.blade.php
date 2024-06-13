@extends('backend.master')

@section('content')
<div class="tile">
    <h3 class="tile-title">Tambah Data Riwayat Pelanggaran</h3>
    <div class="row">
      <div class="col-lg-5">
        <form action="{{ route('testing-store') }}" method="POST">
          @csrf
          <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
@endsection