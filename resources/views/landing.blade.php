<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'Hello Medicine')
@section ('css', '<style>.home{color: black;}</style>')
@section ('content')
<body style="font-family: 'Nunito', sans-serif; background-image:url('http://127.0.0.1:8000/images/landing.jpg'); background-size:cover;">
@extends('layout.navbar')
<!-- content -->
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{url('images/banner.png')}}">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                        <div class="text-danger my-3" style="font-size: 5vw;"><span class="fw-bolder">Hello</span> Medicine</div>
                        <div class="fs-5 fw-semibold" style="margin-bottom: 5vw;">Bandingkan harga terbaik dari toko kami</div>
                        <!-- cari button -->
                        <div class="d-flex justify-content-center align-items-center" style="height:50px; width:200px; background-color: #07275d;" class="btn btn-primary mx-2">
                            <span class="fs-5 text-white">
                                <a class="nav-link" href="medicine">Jelajahi</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{url('images/banner.png')}}">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-start">
                        <div class="text-danger my-3" style="font-size: 5vw;"><span class="fw-bolder">Hello</span> Medicine</div>
                        <div class="fs-5 fw-semibold" style="margin-bottom: 5vw;">Temukan obat yang aman dan dengan khasiat terbaik</div>
                        <!-- cari button -->
                        <div class="d-flex justify-content-center align-items-center" style="height:50px; width:200px; background-color: #07275d;" class="btn btn-primary mx-2">
                            <span class="fs-5 text-white">
                                <a class="nav-link" href="medicine">Jelajahi</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="text-danger my-3" style="font-size: 5vw;"><span class="fw-bolder">Hello</span> Medicine</div>
                        <div class="fs-5 fw-semibold" style="margin-bottom: 5vw;">Berbagai obat terbaik tersedia untuk Anda!</div>
                        <!-- cari button -->
                        <div class="d-flex justify-content-center align-items-center" style="height:50px; width:200px; background-color: #07275d;" class="btn btn-primary mx-2">
                            <span class="fs-5 text-white">
                                <a class="nav-link" href="medicine">Jelajahi</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{url('images/banner.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #f2f2f2;"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #f2f2f2;"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<script>
    // set carousel interval
    $('.carousel').carousel({
        interval: 2000
    })
</script>
@endsection