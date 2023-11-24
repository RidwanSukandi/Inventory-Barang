@extends('layout.template')

@section('content')


<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Update Jenis Barang</h5>

    <hr />

    @foreach ($jenis_barang as $item)
    <form action={{"/jenis-barang/edit/".$item->id}} method="POST">
      @csrf
      @method("PUT")
      <div class="mt-4">
        <input type="text" name="jenis_barang" value="{{$item->jenis_barang}}" class="form-control" placeholder="Jenis Barang">
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
    @endforeach
  </div>
</div>

@endsection
