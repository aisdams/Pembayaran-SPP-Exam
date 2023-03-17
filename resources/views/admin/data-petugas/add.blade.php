@extends('admin.layout')

@section('content')
<div class="col-md-12 grid-margin stretch-card mt-5">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between mb-3">
        <h2>Add New Petugas</h2>
        <a href="{{ url('data-petugas')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('data-petugas')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <h6 class="mb-3">Nama Petugas <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama Petugas..." name="nama_petugas">
          @error('nama_petugas')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">Username <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Username..." name="username">
            @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
          </div>
        <div class="form-group">
            <input type="hidden" class="form-control @error('level') is-invalid @enderror" id="exampleInputUsername1" name="level" value="petugas">
            @error('level')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">password <span class="text-danger">*</span></h6>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputpassword1" placeholder="Masukkan password..." name="password">
            @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-spp')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection