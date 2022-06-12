<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'All Medicines')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
@extends('layout.navbar')
@isset($keyword)
<div class="container">
    <div class="text-primary fs-6"><span><a style="text-decoration: none;" href="{{ route('medicine') }}">Medicine</a> > </span><a class="text-secondary" style="text-decoration: none;">{{ $keyword }}</a></div>
</div>
@endisset
<!-- content -->
<div class="container">
    <!-- get all the medicine -->
    <div class="row justify-content-center">
        @isset($keyword)
            <h2 class="text-danger text-center mt-3 fw-bolder">Pencarian Obat</h2>
            <p class="fs-6 mb-5 text-center">Hasil pencarian dengan kata kunci <span class="text-danger">{{ $keyword }}</span></p>
        @else
            @if(Auth::check())
            @if (Auth::user()->role == 'admin')
                <h2 class="text-danger text-center mt-3 fw-bolder align-self-center">Data Obat 
                    <span>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 20px; height:20px; color:green; border-radius:50%;"><span><i class="fa-solid fa-circle-plus"></i></span></a>
                    </span>
                </h2>
                <p class="fs-6 mb-5 text-center">Klik obat untuk detail lebih banyak</p>
            @endif
            @else
                <h2 class="text-danger text-center mt-3 fw-bolder">Semua Obat</h2>
                <p class="fs-6 mb-5 text-center">Klik obat untuk detail lebih banyak</p>
            @endif
        @endisset
        @foreach($medicines as $medicine)
        <div class="card mx-2 text-center shadow d-lg-block d-none" style="width: 15rem;">
            <!-- img from medicine -->
            <img src="{{url('/images/medicines/'.$medicine->image)}}" loading=”lazy” class="card-img-top">
            <div class="card-body">
                <hr>
                <h5 class="card-title">{{ $medicine->name }}</h5>
                <p class="card-text text-success">Rp. {{ number_format($medicine->price) }}</p>
                <a href="{{ route('medicine.show', $medicine->id) }}" class="stretched-link"></a>
            </div>
            <!-- stretched link of show detail -->
        </div>
        <div class="card mx-2 text-center shadow d-lg-none d-block" style="width: 12rem;">
        <!-- img from medicine -->
        <img src="{{url('/images/medicines/'.$medicine->image)}}" loading=”lazy” class="card-img-top">
            <div class="card-body">
                <hr>
                <h5 class="card-title">{{ $medicine->name }}</h5>
                <p class="card-text text-success">Rp. {{ number_format($medicine->price) }}</p>
                <a href="{{ route('medicine.show', $medicine->id) }}" class="stretched-link"></a>
            </div>
            <!-- stretched link of show detail -->
        </div>
        @endforeach
        <!-- if medicine is none -->
        @if(count($medicines) == 0)
            <div class="container my-5 text-center">
                <h5 class="card-title">Obat tidak ditemukan</h5>
                <p class="card-text text-danger">Silahkan gunakan kata kunci lain</p>
            </div>
        @endif
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Data Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form enctype="multipart/form-data" action="{{ route('medicine.store') }}" method="post">
            @csrf
            <!-- image -->
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <!-- nama -->
            <div class="form-group mb-3">
                <label for="name">Nama Obat</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Obat">
            </div>
            <!-- deskripsi -->
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" placeholder="Deskripsi Obat" name="description" rows="3"></textarea>
            </div>
            <!-- komposisi -->
            <div class="form-group mb-3">
                <label for="composition">Komposisi</label>
                <input type="text" class="form-control" id="composition" placeholder="Komposisi Obat" name="composition">
            </div>
            <!-- kuantitas -->
            <div class="form-group mb-3">
                <label for="quantity">Kuantitas</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Kuantitas">
            </div>
            <!-- harga -->
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Harga">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Tambah Obat</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection