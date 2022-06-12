<!-- extend layout -->
@extends('layout.master')
@section ('title' , 'Login Hello Medicine')
@section ('content')
<body style="background-color:#002661; font-family: 'Nunito', sans-serif;">
<!-- content -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 620px;">
    <div class="card">
    <div class="row">
        <div class="col-md-6">
        <img src="{{url('/images/loginbg.jpg')}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-6">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center flex-column" style="height: 450px;">
                <h2 class="fw-bold mb-5" style="color:#2b3767;">Welcome!</h2>
                <!-- login form -->
                <form method="POST" action="{{ route('login.auth') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" class="form-control" style="background-color: #f1f5f9;" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" style="background-color: #f1f5f9;" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <!-- not a member? -->
                    <div class="d-flex justify-content-center align-items-center">
                        <p>Not a member? <span><a href="register" class="text-primary">Register</a></span></p>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection