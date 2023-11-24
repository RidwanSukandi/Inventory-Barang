
@extends('layout.template')

@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">
      Data Pengguna
    </h6>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data Pengguna</button>

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
            <th>Nik</th>
            <th>Name</th>
            <th>Telepon</th>
            <th>Username</th>
            <th>Level</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Name</th>
            <th>Telepon</th>
            <th>Username</th>
            <th>Level</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($users as $user)
          <tr>   
            <td>{{$loop->iteration}}</td>      
            <td>{{$user->nik}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->telepon}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->level}}</td>
            <td><img src="{{asset('images/'.$user->foto)}}" alt="" width="50px"></td>
            <td> <button type="button" class="btn btn-primary" data-id="{{ $user->id }}" id="buttonEdit" data-toggle="modal" data-target="#editModal">Edit</button> 
              
                <button type="button" id="buttonDelete" class="btn btn-danger" data-id="{{ $user->id }}" >Hapus</button>
             
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


<!-- Modal -->
<form action={{ route('post') }} method="post" enctype="multipart/form-data">
  @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        
          <div class="row mb-3">
            <div class="col">
              <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" required  placeholder="Nik" >
              @error('nik')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>

            <div class="col">
              <input type="text" id="name" name="name" class="form-control" @error('name') is-invalid @enderror required placeholder="Name">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <input type="number" name="telepon" class="form-control " @error('name') is-invalid @enderror placeholder="Telepon">
              @error('telepon')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>

            <div class="col">
              <input type="text" name="username" class="form-control" @error('username') is-invalid @enderror required placeholder="Username">
              @error('username')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <select class="form-control" name="level" required id="exampleFormControlSelect1">
                <option selected>Pilih Level</option>
                <option>admin</option>
                <option>user</option>
              </select>
            </div>

            <div class="col">
              <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror  placeholder="Password">
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>  
      
          <div class="custom-file col">
            <input type="file" name="foto" class="custom-file-input" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
          </div>

        </div>
     
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
@foreach ($users as $user)
    
<form action={{ route('user.update',$user->id) }} method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        
          <div class="row mb-3">
            <div class="col">
              <input type="number" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" required  placeholder="Nik" >
              @error('nik')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>

            <div class="col">
              <input type="text" id="names" name="name" class="form-control" @error('name') is-invalid @enderror required placeholder="Name">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <input type="number" id="telepon" name="telepon" class="form-control " @error('name') is-invalid @enderror placeholder="Telepon">
              @error('telepon')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>

            <div class="col">
              <input type="text" id="username" name="username" class="form-control" @error('username') is-invalid @enderror required placeholder="Username">
              @error('username')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <select class="form-control" id="level" name="level" required id="exampleFormControlSelect1">
                <option selected>Pilih Level</option>
                <option>admin</option>
                <option>user</option>
              </select>
            </div>

            <div class="col">
              <input type="password" id="password" name="password" class="form-control" @error('password') is-invalid @enderror  placeholder="Password">
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
            </div>
          </div>  
      
          <div class="custom-file col">
            <input type="file" name="foto" class="custom-file-input" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
          </div>

        </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#buttonEdit').on('click', function() {
            var userId = $(this).data('id');
            console.log(userId);
            var targetModal = $(this).data('target');
            var modal = $(targetModal);

            $.ajax({
                url: 'http://localhost:8000/data-pengguna/' + userId, // Ganti dengan rute yang sesuai di Laravel
                method: 'GET',
                success: function(response) {
                    // Isi modal dengan data pengguna yang diterima dari server
                    // modal.find('.modal-body input#name').val(response.name);
                    $('#nik').val(response.nik);
                    $('#names').val(response.name);
                    $('#telepon').val(response.telepon);
                    $('#username').val(response.username);
                    $('#level').val(response.level);
                    $('#password').val(response.pasword);

                },
                error: function(error) {
                    console.error(error);
                }
            });

            modal.modal('show'); // Tampilkan modal
        });
      });

      $(document).ready(function(){      
        $('#buttonDelete').on('click',function() {
          var userId = $(this).data('id');
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

           confirm("Yakin anda ingin menghapus data user");

          

          $.ajax({
                url: 'http://localhost:8000/data-pengguna/' + userId, // Ganti dengan rute yang sesuai di Laravel
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Isi modal dengan data pengguna yang diterima dari server
                    // modal.find('.modal-body input#name').val(response.name);
                    swal("Good job!", "berhasil menghapus data", "success");
                    
                    setTimeout(() => {
                      location.reload();
                    }, 3000);
                    
                },
                error: function(error) {
                    console.error(error);
                }
            });
        
        })    
      })
    
</script>


@endsection




