@extends('layout.template')

@section('content')
    

<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Add Stock Gudang</h5>
    <hr />
    <form action="/stock/update/{{$stock->id}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-row mb-4">
        <div class="col">
          <input type="number" value="{{$stock->kode_barang}}" name="kode_barang" class="form-control" placeholder="Kode Barang">
        </div>
        <div class="col">
          <input type="text" value="{{$stock->nama_barang}}" name="nama_barang" class="form-control" placeholder="Nama Barang">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
          <input type="text" value="{{$stock->jenis_barang}}" name="jenis_barang" class="form-control" placeholder="Jenis Barang">
        </div>
        <div class="col">
          <input type="number" value="{{$stock->jumlah_barang}}" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
        </div>
      </div>
      <div class="">
        <input type="text" value="{{$stock->satuan}}" name="satuan" class="form-control" placeholder="Satuan Barang">
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection