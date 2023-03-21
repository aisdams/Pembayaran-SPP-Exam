@extends('admin.layout')
@section('judul','Add New Siswa')
@section('content')
<div class="col-md-12 grid-margin stretch-card mt-5">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between mb-3">
        <h2>Add New Siswa</h2>
        <a href="{{ url('data-siswa')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('data-siswa')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <h6 class="mb-3">NISN <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan NISN..." name="nisn">
          @error('nisn')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6 class="mb-3">Username <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan username..." name="username">
          @error('username')<div class="invalid-feedback">{{$message}}</div>@enderror
      </div>
        <div class="form-group">
            <h6 class="mb-3">Nis <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nis..." name="nis">
            @error('nis')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">Nama <span class="text-danger">*</span></h6>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nama..." name="nama">
            @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">Kelas <span class="text-danger">*</span></h6>    
            <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"> 
                <option disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $idx)
                <option value="{{$idx->id}}">{{$idx->nama_kelas}}</option>
                @endforeach
            </select>
            @error('kelas_id')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">Kompetensi Keahlian <span class="text-danger">*</span></h6>    
            <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"> 
                <option disabled selected>Pilih Kompetensi Keahlian</option>
                @foreach ($kelas as $idx)
                <option value="{{$idx->id}}">{{$idx->kompetensi_keahlian}}</option>
                @endforeach
            </select>
            @error('kelas_id')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <h6 class="mb-3">Tahun Ajaran <span class="text-danger">*</span></h6>    
            <select class="form-control @error('spps_id') is-invalid @enderror" name="spps_id"> 
                <option disabled selected>Pilih Tahun Ajaran</option>
                @foreach ($spps as $idx)
                <option value="{{$idx->id}}">{{$idx->tahun}}</option>
                @endforeach
            </select>
            @error('spps_id')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
           
        <div class="form-group mb-3">
            <h6 class="mb-3">Password <span class="text-danger">*</span></h6>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan password..." name="password">
            @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-siswa')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection