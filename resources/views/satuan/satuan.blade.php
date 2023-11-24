@extends('layout.template')

@section('content')


<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">
      Satuan Barang
    </h6>
    <a  href="/satuan/create" class="btn btn-primary" >Tambah Data Satuan Barang</a>

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
            <th>Satuan Barang</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Satuan Barang</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($satuan as $items)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$items->satuan_barang}}</td>
            <td> <a href="/satuan/update/{{ $items->id }}" class="btn btn-info">Edit</a>
                <button type="button"  class="btn btn-danger  btn-delete" data-id="{{ $items->id }}" >Hapus</button>
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
        url:`http://localhost:8000/satuan/delete/${id}`,
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

