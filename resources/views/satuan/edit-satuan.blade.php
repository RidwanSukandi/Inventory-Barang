@extends('layout.template')

@section('content')


<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Add Satuan</h5>

    <hr />

    <form action={{"/satuan/edit/".$satuan->id}} method="POST">
      @csrf
      @method('PUT')
      <div class="mt-4">
        <input type="text" name="satuan_barang" value="{{$satuan->satuan_barang}}" class="form-control" placeholder="Satuan">
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection
