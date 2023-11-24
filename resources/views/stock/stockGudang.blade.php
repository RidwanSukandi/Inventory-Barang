
@extends('layout.template')

@section('content')


<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">
      Data Stock
    </h6>
    <a  href="/stock/create" class="btn btn-primary" >Tambah Data Stock</a>

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
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Barang</th>
            <th>Satuan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>        
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Barang</th>
            <th>Satuan</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($stocks as $stock)
          <tr>   
            <td>{{$loop->iteration}}</td>      
            <td>{{$stock->kode_barang}}</td>
            <td>{{$stock->nama_barang}}</td>
            <td>{{$stock->jenis_barang}}</td>
            <td>{{$stock->jumlah_barang}}</td>
            <td>{{$stock->satuan}}</td>
            <td> <a href="/stock/update/{{ $stock->id }}" class="btn btn-info">Edit</a>             
                <button type="button"  class="btn btn-danger  btn-delete" data-id="{{ $stock->id }}" >Hapus</button>             
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
        url:`http://localhost:8000/stock/${id}`,
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






