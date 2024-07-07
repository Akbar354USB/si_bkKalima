@extends('backend.master')

@section('content')

  <div class="tile">
    <h3 class="tile-title">Data Riwayat Pelanggaran</h3>
    <table class="table">
      <thead>
        <tr align="center">
          <th>No</th>
          <th>Kode Riwayat</th>
          <th>Nama siswa</th>
          <th>Kelas</th>
          <th>Kode Pelanggaran</th>
          <th>Pelanggaran</th>
          <th>Aksi</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($riwayats as $key => $item)
        <tr>
          <td align="center">{{ $key+1 }}</td>
          <td align="center">{{ $item->kode_riwayat }}</td>
          <td align="center">{{ $item->siswa }}</td>
          <td align="center">{{ $item->kelas }}</td>
          <td align="center">{{ $item->kode_tatib }}</td>
          <td align="center">{{ $item->nama_tatib }}</td>
          <td align="center">
            <a class="btn btn-primary" href="" ><i class="fa fa-lg fa-edit"></i></a>
            <form action="{{ route('riwayat-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
