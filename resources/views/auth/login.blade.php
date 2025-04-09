@extends('adminlte.layouts.auth')

@section('content')
<style>
    /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #ecf0f3;
}

.wrapper {
    max-width: 350px;
    min-height: 350px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
    width: 200px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* border-radius: 50%; */
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 16px;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #B40404;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #B40404;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #B40404;
}

.wrapper a:hover {
    color: #B40404;
}


.invalid-feedback {
    font-size: 0.8rem;
    color: red;
    text-align: left;
    width: 100%;
    transition: opacity 0.5s ease;
}


@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}
</style>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('asset/img/logo/logo_be2.png') }}" alt="">
        </div>
        <div class="text-center mt-4 name">

        </div>
        <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-field d-flex align-items-center flex-column">
            <div class="w-100 d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" class="form-control border-0 shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
        </div>
        @error('email')
            <span class="invalid-feedback d-block mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-field d-flex align-items-center flex-column">
            <div class="w-100 d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" class="form-control border-0 shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Password">
            </div>
        </div>
        @error('password')
            <span class="invalid-feedback d-block mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const invalidFeedbacks = document.querySelectorAll('.invalid-feedback');

            if (invalidFeedbacks.length > 0) {
                setTimeout(() => {
                    invalidFeedbacks.forEach(el => {
                        el.style.transition = 'opacity 0.5s ease';
                        el.style.opacity = '0';

                        // opsional: sembunyikan elemen sepenuhnya setelah transisi selesai
                        setTimeout(() => {
                            el.style.display = 'none';
                        }, 500);
                    });
                }, 3000); // 3 detik
            }
        });
    </script>

@endsection
