@extends('backend.master')

@section('content')
<div class="tile">
  <h3 class="tile-title">Tambah Data Tata Tertib</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('tatib-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="KODE TATIB" name="kode_tatib">
          @error('kode_tatib')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <label class="control-label">KATEGORI</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kategori" value="RINGAN">RINGAN
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kategori" value="SEDANG">SEDANG
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="kategori" value="BERAT">BERAT
                </label>
            </div>
            @error('kategori')
            <span class="text-danger">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-lg-5 offset-lg-1">
        <div class="form-group">
        <input class="form-control" placeholder="NAMA TATIB" name="nama_tatib">
        @error('nama_tatib')
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
    <h3 class="tile-title">Data Tata Terib</h3>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Tatib</th>
          <th>Nama Tatib</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tatib as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->kode_tatib }}</td>
          <td>{{ $item->nama_tatib }}</td>
          <td>{{ $item->kategori }}</td>
          <td>
            <form action="{{ route('tatib-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
          {{ $tatib->links() }}
        </div>
@endsection