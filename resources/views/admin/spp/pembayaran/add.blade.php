@extends('admin.layout')
@section('content')
@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

@endpush
<div class="col-md-12 grid-margin stretch-card mt-5">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between mb-3">
        <h2>Add New Pembayaran</h2>
        <a href="{{ url('data-pembayaran')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample mt-3" action="{{ url('data-pembayaran')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <h6 class="mb-3">Nama Siswa<span class="text-danger">*</span></h6>
          <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="">Pilih Siswa</option>
            @foreach ($siswa as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
            @endforeach
          </select>
          @error('user_id')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Nominal <span class="text-danger">*</span></h6>
            <select class="form-control @error('spps_id') is-invalid @enderror" name="spps_id" id="spps_id" required>
                <option value="">-- Pilih Nominal SPP --</option>
                @foreach ($spps as $spp)
                <option value="{{ $spp->id }}">{{ $spp->tahun }} - {{ $spp->nominal }}</option>
                @endforeach
            </select>    
            @error('spps_id')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Tanggal Bayar <span class="text-danger">*</span></h6>
            <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" id="tgl_bayar" required>
            @error('tgl_bayar')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Bulan Bayar <span class="text-danger">*</span></h6>
            <select class="form-control" id="choices-multiple-remove-button" name="bulan_bayar[]" multiple="multiple" style="width:40px" required>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
            </select>
        </div>
        <div class="form-group">
            <h6 class="mb-3">Jumlah Bayar <span class="text-danger">*</span></h6>
            <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" id="jumlah_bayar" readonly>
            @error('jumlah_bayar')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6 class="mb-3">Status <span class="text-danger">*</span></h6>
            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="lunas">Lunas</option>
                <option value="belum lunas">Belum Lunas</option>
            </select>
            @error('status')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-pembayaran')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
    $(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:12,
       searchResultLimit:12,
       renderChoiceLimit:12
     }); 
    
    
});
</script>
@endpush