@extends('layout.template')


@section('content')
  
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<h4> Selamat Datang Di Sistem Inventaris Barang</h4>

<div class="row mt-5">

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                        Data <br> Pengguna</div>
                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                      Stock <br> Gudang</div>
                  {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
              </div>
              <div class="col-auto">
                  <i class="fas fa-box fa-2x text-gray-300"></i>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                      Barang <br> Masuk</div>
                  {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
              </div>
              <div class="col-auto">
                  <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                      Barang <br> Keluar</div>
                  {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
              </div>
              <div class="col-auto">
                  <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
              </div>
          </div>
      </div>
  </div>
</div>


</div>

@endsection



