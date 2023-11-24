@extends('layout.template')

@section('content')


<div class="card">
  <div class="card-body">
    <h5 class="text-primary">Add Stock Gudang</h5>

    <hr />
    <form action="{{route('stock.store')}}" method="POST">
      @csrf
      <div class="form-row mb-4">
        <div class="col">
          <input type="number" name="kode_barang" class="form-control" placeholder="Kode Barang">
        </div>
        <div class="col">
          <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
            <select class="form-control" name="jenis_barang" id="">
                <option value="">---Jenis Barang---</option>
                @foreach ($jenis_barang as $item)
                <option value="{{$item->jenis_barang}}">{{$item->jenis_barang}}</option>
                @endforeach
            </select>
          {{-- <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang"> --}}
        </div>
        <div class="col">
          <input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
        </div>
      </div>
      <div class="">
        <select class="form-control" name="satuan" id="">
            <option value="">---Satuan Barang---</option>
            @foreach ($satuan as $item)
                 <option value="{{$item->satuan_barang}}">{{$item->satuan_barang}}</option>
            @endforeach
        </select>
      </div>
      <div class="footer mt-4">
     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="/stock" class="btn btn-info">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection
