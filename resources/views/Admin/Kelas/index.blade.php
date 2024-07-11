@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Tambah Data Kelas</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('kelas-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="KODE KELAS" name="kode_kelas">
          @error('kode_kelas')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
    </div>
    <div class="col-lg-5 offset-lg-1">
        <div class="form-group">
          <input class="form-control" placeholder="NAMA KELAS" name="nama_kelas">
          @error('kode_kelas')
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
<div class="tile mb-2">
    <h3 class="tile-title">Data Kelas</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kelas</th>
          <th>Nama Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelas as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->kode_kelas }}</td>
          <td>{{ $item->nama_kelas }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('kelas-edit', $item->id) }}" ><i class="fa fa-lg fa-edit"></i></a>
            <form action="{{ route('kelas-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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

        {{-- tag menambahkan pagination --}}
        <div class="mb-1 float-right">
          {{ $kelas->links() }}
        </div>
@endsection