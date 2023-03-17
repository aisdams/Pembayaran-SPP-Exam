@extends('admin.layout')
@section('judul', 'Data Siswa')
@section('content')
    
<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Tabel Data Siswa</h2>
          <a href="{{ url('data-siswa/create') }}" style="text-decoration: none" class="tbl-btn button btn-primary p-2 rounded-2">Add New Siswa</a>
        </div>
        <hr class="border-dark my-4">
        <div class="table-responsive">
          <table class="table table-hover table-striped border rounded-1" id="siswa">
            <thead>
              <tr>
                <th class="fw-bold text-center">No</th>
                <th class="fw-bold text-center">NISN</th>
                <th class="fw-bold text-center">NIS</th>
                <th class="fw-bold text-center">Nama</th>
                <th class="fw-bold text-center">Kelas</th>
                <th class="fw-bold text-center">Kompetensi Keahlian</th>
                <th class="fw-bold text-center">Tahun Ajaran</th>
                <th class="fw-bold text-center">Nominal</th>
                <th class="fw-bold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
            @endphp
            @foreach ($siswa as $idx)
              <tr>
                <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                <td class="text-center fs-6">{{$idx->nisn}}</td>
                <td class="text-center fs-6">{{$idx->nis}}</td>
                <td class="text-center fs-6">{{$idx->nama}}</td>
                <td class="text-center fs-6">{{$idx->kelas->nama_kelas}}</td>
                <td class="text-center fs-6">{{$idx->kelas->kompetensi_keahlian}}</td>
                <td class="text-center fs-6">{{$idx->spps->tahun}}</td>
                <td class="text-center fs-6">Rp. {{number_format($idx->spps->nominal)}}</td>
                {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                <td class=" d-flex gap-2 justify-content-center text-center">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editKelasModal"><i class="fa-solid fa-pen pr-1"></i>
                    Edit
                  </button>
                  <!-- Modal -->
                    <div class="modal fade" id="editKelasModal" tabindex="-1" aria-labelledby="editsiswaModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editsiswaModalLabel">Edit Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="{{ url('data-siswa/'.$idx->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" class="form-control" id="nisn" name="nisn" value="{{ $idx->nisn }}">
                              </div>
                              <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis" value="{{ $idx->nis }}">
                              </div>
                              <div class="mb-3">
                                <label for="nama" class="form-label">nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $idx->nama }}">
                              </div>
                              <div class="mb-3">
                                <label for="Kompetensi Keahlian" class="form-label">Kompetensi Keahlian</label>
                                <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{ $idx->kompetensi_keahlian }}">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <form action="{{ url('data-siswa',$idx->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm fw-semibold text-white rounded-2 bg-danger delete ml-2" data-name="{{ $idx->nisn }}"><i class="fa-solid fa-trash mr-1" style="font-size: 13px"></i>Delete</button>
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

  @push('scripts')
  <!-- jQuery -->
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>
  
<script>
  $(function () {
      $('#siswa').DataTable().fnDestroy({
          columnDefs: [{
              paging: true,
              scrollX: true,
              lengthChange: true,
              searching: true,
              ordering: true,
              targets: [1, 2, 3, 4],
          }, ],
      });
      $('button').click(function () {
          var data = table.$('input, select', 'button', 'form').serialize();
          return false;
      });
      table.columns().iterator('column', function (ctx, idx) {
          $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
      });
  });
</script>

  <script>        
    $('.delete').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete ${name}?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
        swal("Data berhasil di hapus", {
              icon: "success",
              });
      }else 
      {
        swal("Data tidak jadi dihapus");
      }
    });
  });
  </script>

  <script>
    @if (Session::has('success'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>

  <script>
    @if (Session::has('destroy'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
    toastr.success("{{ Session::get('destroy') }}")
    @endif
  </script>

@endpush