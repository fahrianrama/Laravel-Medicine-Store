<!-- extend layout -->
@extends('layout.master')
<!-- set title -->
@section('title', 'Register Account')
@section ('content')
<body style="background-color:#172a23; font-family: 'Nunito', sans-serif;">

<!-- content -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 620px;">
    <div class="card">
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center flex-column" style="height: 450px;">
                    <h2 class="fw-bold mb-5" style="color:#2b3767;">Sign Up<br>to Hello Medicine</h2>
                    <!-- login form -->
                    <form method="POST" action="{{ route('login.registeraction') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="username" class="form-control" style="background-color: #f1f5f9;" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" style="background-color: #f1f5f9;" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                        <!-- name -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image-portrait"></i></span>
                            <input type="text" name="name" class="form-control" style="background-color: #f1f5f9;" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                        </div>
                        <!-- gender -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-person-half-dress"></i></span>
                            <select class="form-control" name="gender" style="background-color: #f1f5f9;">
                                <option value="" selected>Gender</option>
                                <option value="laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!-- location -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-map-marker-alt"></i></span>
                            <input type="text" name="location" class="form-control" style="background-color: #f1f5f9;" placeholder="Location" aria-label="Location" aria-describedby="basic-addon1">
                        </div>
                        <!-- not a member? -->
                        <div class="d-flex justify-content-center align-items-center">
                            <p>Already member? <span><a href="login" class="text-primary">Login</a></span></p>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{url('/images/registerbg.jpg')}}" class="img-fluid rounded-start" style="height: 100%; width:120%;" alt="...">
        </div>
    </div>
    </div>
</div>
@endsection