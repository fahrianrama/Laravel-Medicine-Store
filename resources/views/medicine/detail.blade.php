<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'Detail Medicine')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
    <!-- content -->
    @extends('layout.navbar')
<div class="container">
    <div class="text-primary fs-6"><span><a style="text-decoration: none;" href="{{ route('medicine') }}">Medicine</a> > </span><a style="text-decoration: none;" href="http://localhost:8000/medicine/show/{{ $medicine->id }}">{{ $medicine->name }}</a></div>
</div>
<div class="container my-4">
    <div class="row">
        <div class="col-md-4 border shadow" style="border-radius: 10%;" >
            <img src="{{url('/images/medicines/'.$medicine->image)}}" style="border-radius: 10%;" loading=”lazy” class="card-img-top" alt="...">
        </div>
        <div class="col-md-8">
            <div class="mx-3">
                <h1 class="text-primary fw-bold">{{ $medicine->name }}</h1>
                <div class="mx-1">
                    <p class="fw-bold fs-5">Deskripsi</p>
                    <p class="text-secondary">{{ $medicine->description }}</p>
                    <p class="fw-bold fs-5">Komposisi</p>
                    <p class="text-secondary">{{ $medicine->composition }}</p>
                    <p class="fw-bold fs-5">Jumlah</p>
                    <p class="text-secondary">{{ $medicine->quantity }}</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-bold fs-5">Harga</p>
                            <p class="text-success fs-5">Rp. {{ number_format($medicine->price) }}</p>
                        </div>
                        <div>
                            @if(Auth::check())
                            @if (Auth::user()->role == 'admin')
                            <div type="button" class="mb-2 d-flex justify-content-center align-items-center shadow text-white bg-warning" style="height:40px; width:140px; border: none; padding: 7px 26px; border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#staticBackdropedit">
                                <i class="fa-solid fa-pen-to-square"></i><span class="mx-2">Edit Data</span>
                            </div>
                            <div type="button" class="d-flex justify-content-center align-items-center shadow text-white bg-danger" style="height:40px; width:140px; border: none; padding: 7px 26px; border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#staticBackdropdelete">
                                <i class="fa-solid fa-circle-xmark"></i><span class="mx-2">Delete</span>
                            </div>
                            @else
                            <div type="button" class="d-flex justify-content-center align-items-center shadow" style="height:40px; width:120px; background-color: #f3004e; border: none; padding: 7px 26px; border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="text-white fa-solid fa-cart-plus fa-lg"></i>
                            </div>
                            @endif
                            @else
                            <div type="button" class="d-flex justify-content-center align-items-center shadow text-white" style="height:40px; width:200px; background-color: grey; border: none; padding: 7px 26px; border-radius: 15px;">
                                <i class="fa-solid fa-cart-plus fa-lg"></i> <span class="mx-2">Login to Buy!</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdropedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form action="{{ route('medicine.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $medicine->id }}">
            <!-- nama -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $medicine->name }}">
            </div>
            <!-- deskripsi -->
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $medicine->description }}</textarea>
            </div>
            <!-- komposisi -->
            <div class="form-group">
                <label for="composition">Komposisi</label>
                <input class="form-control" id="composition" name="composition" value="{{ $medicine->composition }}">
            </div>
            <!-- kuantitas -->
            <div class="form-group">
                <label for="quantity">Kuantitas</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $medicine->quantity }}">
            </div>
            <!-- harga -->
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $medicine->price }}">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning text-white">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambahkan ke Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><h3 class="text-primary fw-bold">{{ $medicine->name }}</h3><span><div class="text-secondary">{{ ucfirst($medicine->composition) }}</div></span></p>
        <p class="text-success fs-5">Rp. {{ number_format($medicine->price) }}</p>
        <!-- form -->
        <form action="{{ route('addcart') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $medicine->id }}">
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Jumlah">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Checkout</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal delete -->
<div class="modal fade" id="staticBackdropdelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus obat ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
        <a href="{{ route('medicine.drop',$medicine->id) }}" type="button" class="btn btn-danger">Konfirmasi</a>
      </div>
    </div>
  </div>
</div>


@endsection