@extends('admin.layout')
@section('judul', 'Data Petugas')
@section('content')
    
<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Tabel Data Petugas</h2>
          <a href="{{ url('data-petugas/create') }}" style="text-decoration: none" class="tbl-btn button btn-primary p-2 rounded-2">Add New Petugas</a>
        </div>
        <hr class="border-dark my-4">
        <div class="table-responsive">
          <table class="table table-hover table-striped border rounded-1">
            <thead>
              <tr>
                <th class="fw-bold text-center">No</th>
                <th class="fw-bold text-center">Id Petugas</th>
                <th class="fw-bold text-center">Nama Petugas</th>
                <th class="fw-bold text-center">Username</th>
                <th class="fw-bold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($petugas as $idx)
                <tr>
                  <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                  <td class="text-center fs-6">{{$idx->id_petugas}}</td>
                  <td class="text-center fs-6">{{$idx->nama_petugas}}</td>
                  <td class="text-center fs-6">{{$idx->username}}</td>
                  {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                  <td class=" d-flex gap-2 justify-content-center text-center">
                    <a href="{{ url('data-petugas/'.$idx->id.'/edit') }}" class="btn btn-sm fw-semibold  text-white rounded-2 bg-warning"> <i class="fa-solid fa-pen pr-1"></i>
                      Edit
                    </a>
                    <form action="{{ url('data-petugas',$idx->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-sm fw-semibold text-white rounded-2 bg-danger delete ml-2" data-name="{{ $idx->nama_petugas }}"><i class="fa-solid fa-trash mr-1" style="font-size: 13px"></i>Delete</button>
                        </form>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection