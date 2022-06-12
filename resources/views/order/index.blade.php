<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'User Order')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
@extends('layout.navbar')
<!-- content -->
<div class="container mb-5">
    <h2 class="text-danger text-center mt-5 fw-bolder">Pesanan User (Pending)</h2>
    <p class="fs-6 mb-5 text-center text-secondary">Daftar pesanan yang menunggu dikonfirmasi</p>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('myorder') }}"> <span><i class="fa-solid fa-bell"></i></span> Berlangsung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.success') }}"> <span><i class="fa-solid fa-check"></i></span> Berhasil</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <!-- all order -->
            <div class="row">
                @foreach($orders as $order)
                @if ($order->status == 'pending')
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
                                            <div class="card-text">Pemesan : <span class="text-secondary">{{ App\Http\Controllers\UserController::getNamebyId($order->user_id) }}</span></div>
                                            <a href="{{ route('medicine.show', $medicine->id) }}" class="card-title mb-3 text-primary fw-bold fs-4" style="text-decoration: none;">{{ $medicine->name }}</a>
                                            <div class="card-text mb-2">Jumlah : {{ $order->quantity }} pcs</div>
                                            <div class="card-text mb-2">Total : <span class="text-success fw-bold">Rp. {{ number_format($order->quantity * $medicine->price) }}</span></div>
                                            <!-- lokasi -->
                                            <div class="card-text mb-2">Lokasi : {{ App\Http\Controllers\UserController::getLocationbyId($order->user_id) }}</div>
                                            <div class="card-text">Ditambahkan Pada : <span class="text-secondary">{{ $order->created_at }}</span></div>
                                        </div>
                                        <div class="align-self-center">
                                            <div class="col">
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#checkout-{{ $order->id }}" class="my-3 d-flex justify-content-center align-items-center shadow text-white" style="text-decoration:none; height:40px; width:120px; background-color: green; border: none; padding: 7px 26px; border-radius: 10px;">
                                                    <i class="fa-solid fa-circle-check"></i></i><span class="mx-1">Konfirmasi</span>
                                                </a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#cancel-{{ $order->id }}" class="my-3 d-flex justify-content-center align-items-center shadow text-white" style="text-decoration:none; height:40px; width:120px; background-color: #f3004e; border: none; padding: 7px 26px; border-radius: 10px;">
                                                    <i class="fa-solid fa-xmark"></i></i><span class="mx-1">Batalkan</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Cancel -->
                <div class="modal fade" id="cancel-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Order?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card-text">Pemesan : <span class="text-secondary">{{ App\Http\Controllers\UserController::getNamebyId($order->user_id) }}</span></div>
                        <a href="{{ route('medicine.show', $medicine->id) }}" class="card-title mb-3 text-primary fw-bold fs-4" style="text-decoration: none;">{{ $medicine->name }}</a>
                        <div class="card-text mb-2">Jumlah : {{ $order->quantity }} pcs</div>
                        <div class="card-text mb-2">Total : <span class="text-success fw-bold">Rp. {{ number_format($order->quantity * $medicine->price) }}</span></div>
                        <div class="card-text mb-2">Lokasi : {{ App\Http\Controllers\UserController::getLocationbyId($order->user_id) }}</div>
                        <div class="card-text">Ditambahkan Pada : <span class="text-secondary">{{ $order->created_at }}</span></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Kembali</button>
                        <a href="{{ route('cancelorder', $order->id) }}" type="button" class="btn btn-danger">Konfirmasi</a>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Modal Checkout -->
                <div class="modal fade" id="checkout-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Checkout?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="card-text">Pemesan : <span class="text-secondary">{{ App\Http\Controllers\UserController::getNamebyId($order->user_id) }}</span></div>
                                <a href="{{ route('medicine.show', $medicine->id) }}" class="card-title mb-3 text-primary fw-bold fs-4" style="text-decoration: none;">{{ $medicine->name }}</a>
                                <div class="card-text mb-2">Jumlah : {{ $order->quantity }} pcs</div>
                                <div class="card-text mb-2">Total : <span class="text-success fw-bold">Rp. {{ number_format($order->quantity * $medicine->price) }}</span></div>
                                <div class="card-text mb-2">Lokasi : {{ App\Http\Controllers\UserController::getLocationbyId($order->user_id) }}</div>
                                <div class="card-text">Ditambahkan Pada : <span class="text-secondary">{{ $order->created_at }}</span></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                <a href="{{ route('order.confirm', $order->id) }}" type="button" class="btn btn-success">Konfirmasi</a>
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