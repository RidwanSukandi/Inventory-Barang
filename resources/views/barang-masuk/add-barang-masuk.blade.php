@extends('layout.template')

@section('content')


<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Add Barang Masuk</h5>

    <hr />
    <form action="{{route('barangMasuk.store')}}" method="POST">
      @csrf
      {{-- <div class="mt-4">
        <input type="text" name="jenis_barang" class="form-control" placeholder="Id Transaksi">
      </div> --}}
      <div class="mt-4">
        <input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk">
      </div>
      <div class="mt-4">

       <select class="form-control" name="nama_barang" id="">
        <option value="">---Nama Barang---</option>
        @foreach ($stock as $item)
        <option value="{{$item->nama_barang}}">{{$item->nama_barang}}</option>
        @endforeach
       </select>

      </div>
      <div class="mt-4">
        <input type="text" name="pengirim" class="form-control" placeholder="Pengirim">
      </div>
      <div class="mt-4">
        <input type="text" name="jumlah_masuk" class="form-control" placeholder="Jumlah Masuk">
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection
