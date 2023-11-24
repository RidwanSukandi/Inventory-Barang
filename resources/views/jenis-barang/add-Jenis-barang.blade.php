@extends('layout.template')

@section('content')
    

<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Add Jenis Barang</h5>

    <hr />
    <form action="{{route('jenis-barang.store')}}" method="POST">
      @csrf
      <div class="mt-4">
        <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang">
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection