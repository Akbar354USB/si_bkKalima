@extends('backend.master')

@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="tile">
  <h3 class="tile-title">Lapor Pelanggaran</h3>
  <div class="row">
    <div class="col-lg-5">
      <form action="{{ route('riwayat-store') }}" method="POST">
        @csrf
        <div class="form-group">
          <input class="form-control" placeholder="KODE RIWAYAT" name="kode_riwayat">
          @error('kode_riwayat')
          <span class="text-danger">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>

        <div class="form-group">
          <select class="form-control" id="selectSiswa" name="siswa_id" value="selectSiswa">
          </select>
          @error('siswa_id')
            <span class="text-danger">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>
    <div class="col-lg-5 offset-lg-1">
        <div class="form-group">
          <select class="form-control" id="selectTatib" name="tatib_id" value="selectTatib">
          </select>
            @error('tatib_id')
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

@section('addscript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {

    $("#selectSiswa").select2({
                placeholder:'PILIH SISWA',
                ajax: {
                    url: "{{route('selectsiswa')}}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });

});

$(document).ready(function() {

$("#selectTatib").select2({
            placeholder:'PILIH TATIB',
            ajax: {
                url: "{{route('selecttatib')}}",
                processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama_tatib
                            }
                        })
                    }
                }
            }
        });
});


</script>
@endsection
