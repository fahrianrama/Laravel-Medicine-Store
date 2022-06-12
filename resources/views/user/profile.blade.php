<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'User Profile')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
@extends('layout.navbar')
<!-- content -->
<div class="container">
    <!-- profile -->
    <div class="row my-5">
        <div class="col-md-5 align-self-center">
            @if ($user->gender=='laki')
                <img src="{{url('/images/user.png')}}" style="border-radius: 10%; max-height:600px;" loading=”lazy” class="card-img-top shadow" alt="...">
            @else
                <img src="{{url('/images/user2.png')}}" style="border-radius: 10%; max-height:600px;" loading=”lazy” class="card-img-top shadow" alt="...">
            @endif
        </div>
        <div class="col-md-7 align-self-center">
            <div class="col">
                <!-- user data -->
                <div class="card p-2 shadow">
                    <div class="card-body">
                        <p class="fw-bold fs-5">Username</p>
                        <hr>
                        <p class="card-text">{{ $user->username }}</p>
                        <p class="fw-bold fs-5">Nama</p>
                        <p class="card-text">{{ $user->name }}</p>
                        <hr>
                        <p class="fw-bold fs-5">Gender</p>
                        <p class="card-text">{{ $user->gender }}</p>
                        <hr>
                        <p class="fw-bold fs-5">Alamat</p>
                        <p class="card-text">{{ $user->location }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection