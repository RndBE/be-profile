@extends('adminlte.layouts.auth')

@section('content')
<style>
/* === Font Import === */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* === Reset dan Dasar === */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(145deg, #f2f2f2, #e0e0e0);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* === Wrapper === */
.wrapper {
  width: 100%;
  max-width: 380px;
  padding: 40px 30px;
  background: #ecf0f3;
  border-radius: 20px;
  box-shadow: 8px 8px 20px #c8c9cc, -8px -8px 20px #ffffff;
  text-align: center;
  animation: fadeIn 0.6s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === Logo === */
.logo {
  width: 180px;
  margin: 0 auto 20px;
}

.logo img {
  width: 100%;
  object-fit: contain;
  filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.15));
}

/* === Judul === */
.wrapper .name {
  font-weight: 600;
  font-size: 1.3rem;
  color: #333;
  margin-bottom: 25px;
}

/* === Form Field === */
.form-field {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 18px;
  background: #ecf0f3;
  border-radius: 25px;
  box-shadow: inset 4px 4px 8px #cbced1, inset -4px -4px 8px #ffffff;
  padding: 8px 15px;
  transition: box-shadow 0.3s ease;
}

.form-field:focus-within {
  box-shadow: inset 2px 2px 6px #cbced1, inset -2px -2px 6px #ffffff, 0 0 0 2px #B40404 inset;
}

.form-field span {
  color: #777;
  margin-right: 10px;
}

.form-field input {
  border: none;
  outline: none;
  background: none;
  flex: 1;
  font-size: 15px;
  color: #333;
}

/* === Tombol Show Password === */
.toggle-password {
  cursor: pointer;
  color: #777;
  transition: color 0.3s ease;
}

.toggle-password:hover {
  color: #B40404;
}

/* === Tombol Login === */
.btn {
  width: 100%;
  height: 42px;
  border: none;
  border-radius: 25px;
  background: #B40404;
  color: #fff;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 10px;
  transition: all 0.3s ease;
  box-shadow: 4px 4px 10px #c5c6c8, -4px -4px 10px #ffffff;
}

.btn:hover {
  background: #a00303;
  transform: translateY(-2px);
}

/* === Error Message === */
.invalid-feedback {
  font-size: 0.8rem;
  color: #d00;
  margin-top: -10px;
  margin-bottom: 5px;
  text-align: left;
  opacity: 1;
  transition: opacity 0.5s ease;
}

/* === Responsif === */
@media (max-width: 400px) {
  .wrapper {
    margin: 30px 15px;
    padding: 30px 20px;
  }
}
</style>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('asset/img/logo/logo_be2.png') }}" alt="Logo Beacon Engineering">
        </div>
        <div class="name mb-4">Selamat Datang</div>
        <p>Masuk untuk mengakses dasbor dan mengelola sistem Anda.</p>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="form-field">
                <span class="far fa-user"></span>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror">
            </div>
            @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror

            <!-- Password -->
            <div class="form-field">
                <span class="fas fa-key"></span>
                <input type="password" id="password" name="password" placeholder="Password"
                        class="@error('password') is-invalid @enderror">
                <span class="fas fa-eye toggle-password" id="togglePassword"></span>
            </div>
            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror

            <!-- reCAPTCHA -->
            <div class="mt-3 mb-3 d-flex justify-content-center">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
            </div>
            @error('g-recaptcha-response')
                <div class="invalid-feedback d-block text-center">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn">Login</button>
            @if (session('lockout_time'))
                <div id="lockoutMessage" class="alert alert-danger text-center mt-3">
                    Terlalu banyak percobaan login.<br>
                    Coba lagi dalam <span id="countdown">{{ session('lockout_time') }}</span> detik.
                </div>
            @endif

        </form>
    </div>
    <!-- Tambahkan script ini di bawah form -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    // Fade-out pesan error setelah 3 detik
    document.addEventListener("DOMContentLoaded", function () {
        const errors = document.querySelectorAll('.invalid-feedback');
        if (errors.length > 0) {
            setTimeout(() => {
            errors.forEach(el => {
                el.style.opacity = '0';
                setTimeout(() => el.style.display = 'none', 500);
            });
            }, 3000);
        }

      // Toggle show/hide password
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
        });


        // Countdown lockout timer
        const countdownEl = document.getElementById('countdown');
        if (countdownEl) {
            let timeLeft = parseInt(countdownEl.textContent);

            const timer = setInterval(() => {
                timeLeft--;
                countdownEl.textContent = timeLeft;

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    // Refresh otomatis supaya user bisa login lagi
                    location.reload();
                }
            }, 1000);
        }
    </script>
</body>
@endsection
