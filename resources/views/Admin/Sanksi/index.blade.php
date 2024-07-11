@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Tambah Data Sanksi</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('sanksi-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="KODE SANKSI" name="kode_sanksi">
          @error('kode_sanksi')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>
    <div class="col-lg-5 offset-lg-1">
        <div class="form-group">
        <input class="form-control" placeholder="NAMA SANKSI" name="sanksi">
        @error('sanksi')
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
    <h3 class="tile-title">Data Sanksi</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Sanksi</th>
          <th>Sanksi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sanksi as $key => $item)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $item->kode_sanksi }}</td>
          <td>{{ $item->sanksi }}</td>
          <td>
            <form action="{{ route('sanksi-delete' , $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
        {{ $sanksi->links() }}
      </div>
@endsection