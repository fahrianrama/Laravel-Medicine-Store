<!-- layout -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- title -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{url('/images/logo.jpeg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9769c63bf6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<!-- get session user -->
@if ($errors->any())
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white bg-danger">
                <img src="{{url('/images/logo.jpeg')}}" style="max-height: 25px;" class="rounded me-2" alt="...">
                <strong class="me-auto">Hello Medicine</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                @foreach($errors->all(':message') as $error)
                    {{ $error }}
                @endforeach
            </div>
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white bg-success">
                <img src="{{url('/images/logo.jpeg')}}" style="max-height: 25px;" class="rounded me-2" alt="...">
                <strong class="me-auto">Hello Medicine</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif
    @yield('content')
    <script>
        // trigger toast on load
        window.onload = function() {
            const toast = new bootstrap.Toast(liveToast)
            toast.show()
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<!-- /layout -->