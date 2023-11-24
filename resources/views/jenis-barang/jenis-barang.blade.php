@extends('layout.template')

@section('content')


<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">
      Data Stock
    </h6>
    <a  href="/jenis-barang/create" class="btn btn-primary" >Tambah Data jenis-barang</a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table
        class="table table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Barang</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Jenis Barang</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($jenisBarangs as $jenisBarang)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$jenisBarang->jenis_barang}}</td>
            <td> <a href="/jenis-barang/update/{{ $jenisBarang->id }}" class="btn btn-info">Edit</a>
                <button type="button"  class="btn btn-danger  btn-delete" data-id="{{ $jenisBarang->id }}" >Hapus</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

$(document).ready(function(){
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  $(".btn-delete").click(function(){
    var id = $(this).data('id')

     if( confirm('apakah anda ingin menghapus data')){

      $.ajax({
        type:"DELETE",
        url:`http://localhost:8000/jenis-barang/delete/${id}`,
        headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
         success : (response) => {
          swal("Good job!", "berhasil menghapus data", "success");
                    setTimeout(() => {
                      location.reload();
                    }, 2000);
        },
        error: function(error) {
                    console.error(error);
                }
        })
    }
  });
});

</script>

