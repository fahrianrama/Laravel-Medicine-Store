<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'User Order')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
@extends('layout.navbar')
<!-- content -->
<div class="container mb-5">
    <h2 class="text-danger text-center mt-5 fw-bolder">Keranjang</h2>
    <p class="fs-6 mb-5 text-center text-secondary">Segera lakukan konfirmasi agar barang segera dikirim</p>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('myorder') }}"> <span><i class="fa-solid fa-bell"></i></span> Berlangsung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('myorder.success') }}"> <span><i class="fa-solid fa-check"></i></span> Berhasil</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <!-- all order -->
            <div class="row">
                @foreach($orders as $order)
                @if ($order->status == 'checkout')
                <!-- get product form product id call function-->
                @php
                    $medicine = App\Http\Controllers\UserController::getMedicine($order->product_id);
                @endphp
                <div class="col-md-12 my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                    <img src="{{url('/images/medicines/'.$medicine->image)}}" style="max-height: 150px;" alt="">
                                </div>
                                <div class="col-md-8 align-self-center">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="text-start">
                                            <a href="{{ route('medicine.show', $medicine->id) }}" class="card-title mb-3 text-primary fw-bold fs-4" style="text-decoration: none;">{{ $medicine->name }}</a>
                                            <div class="card-text mb-2">Jumlah : {{ $order->quantity }} pcs</div>
                                            <div class="card-text mb-2">Total : <span class="text-success fw-bold">Rp. {{ number_format($order->quantity * $medicine->price) }}</span></div>
                                            <div class="card-text">Ditambahkan Pada : <span class="text-secondary">{{ $order->created_at }}</span></div>
                                        </div>
                                        <div class="align-self-center">
                                            <div class="col">
                                                <div class="text-secondary"><span><i class="fa-solid fa-check"></i></span> Pesanan Berhasil</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection