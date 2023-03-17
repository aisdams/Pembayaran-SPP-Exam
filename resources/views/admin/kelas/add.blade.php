@extends('admin.layout')
@section('judul','Add New Data Kelas')
@section('content')
<div class="col-md-12 grid-margin stretch-card mt-5">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between mb-3">
        <h2>Add New Kelas</h2>
        <a href="{{ url('data-kelas')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('data-kelas')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <h6 class="mb-3">Nama Kelas <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Kelas..." name="nama_kelas">
          @error('nama_kelas')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Kompetensi Keahlian <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Kompetensi Keahlian..." name="kompetensi_keahlian">
            @error('kompetensi_keahlian')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-spp')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection