@extends('admin.layout')

@section('content')
<div class="col-md-12 grid-margin stretch-card mt-5">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between mb-3">
        <h2>Add New SPP</h2>
        <a href="{{ url('data-spp')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('data-spp')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <h6 class="mb-3">Tahun Ajaran <span class="text-danger">*</span></h6>
          <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Tahun Ajaran..." name="tahun">
          @error('tahun')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Nominal <span class="text-danger">*</span></h6>
            <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="exampleInputUsername1" placeholder="Masukkan Nominal..." name="nominal">
            @error('nominal')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-spp')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection