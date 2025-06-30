@extends('dashboard.layout.guest')

@section('content')
<style>
    :root {
        --primary-color: #1781bf;
        --accent-color: #ffffff;
        --input-bg: #f0f4f8;
        --input-border: #dbe2ea;
    }

    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Cairo', sans-serif;
        background-color: #f9fbfd;
    }

    .login-wrapper {
        display: flex;
        height: 100vh;
        overflow: hidden;
        padding: 2rem;
        gap: 2rem;
    }

    .login-left {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        animation: fadeIn 0.6s ease-in-out;
    }

    .login-box {
        width: 100%;
        max-width: 420px;
        padding: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 16px;
        background-color: rgba(255, 255, 255, 0.55);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .login-box img {
        max-width: 110px;
        margin: 0 auto 1.5rem;
        display: block;
    }

    .login-box h1 {
        font-size: 1.8rem;
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .login-box p {
        text-align: center;
        color: #6c757d;
        font-size: 0.95rem;
        margin-bottom: 2rem;
    }

    .form-label {
        color: #333;
        font-weight: 500;
        margin-bottom: 0.35rem;
        font-size: 0.9rem;
    }

    .form-control {
        background-color: var(--input-bg);
        border: 1px solid var(--input-border);
        border-radius: 12px;
        padding: 0.65rem 0.85rem;
        font-size: 0.95rem;
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper .toggle-password {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        font-size: 1.1rem;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        border-radius: 12px;
        padding: 0.7rem;
        font-weight: 600;
        font-size: 1rem;
        transition: background 0.3s ease;
        box-shadow: 0 6px 12px rgba(43, 104, 166, 0.25);
    }

    .btn-primary:hover {
        background-color: #126da4;
    }

    .form-check-label {
        font-size: 0.85rem;
        color: #444;
    }

    .login-right {
        flex: 1;
        padding: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.06);
        position: relative;
    }

    .slider-box {
        width: 100%;
        height: 100%;
        border-radius: 0;
        position: relative;
    }

    .carousel-inner,
    .carousel-item,
    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .carousel-indicators {
        bottom: 16px;
        justify-content: center;
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        border: none;
        transition: transform 0.3s ease;
    }

    .carousel-indicators .active {
        background-color: var(--primary-color);
        transform: scale(1.3);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 991px) {
        .login-wrapper {
            flex-direction: column-reverse;
            padding: 1rem;
        }

        .login-left,
        .login-right {
            width: 100%;
            height: auto;
        }

        .slider-box {
            height: 240px;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-left">
        <div class="login-box">
            @php $setting = \App\Models\Setting::first(); @endphp
            @if($setting && $setting->logo)
            <img src="{{ asset($setting->logo) }}" alt="logo">
            @endif

            <h1>{{ __('dash.login') }}</h1>
            <p>{{ __('dash.login_to_your_account') }}</p>

            <form method="POST" action="{{ route('dashboard.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('dash.email') }}</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com"
                        required>
                </div>
                <div class="mb-3 password-wrapper">
                    <label for="password" class="form-label">{{ __('dash.password') }}</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••"
                        required>
                    <span class="toggle-password" onclick="togglePassword(this)"><i class="fas fa-eye"></i></span>
                </div>
                <div class="form-check mb-3 text-start">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                    <label class="form-check-label" for="remember_me">{{ __('dash.remember_me') }}</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">{{ __('dash.login') }}</button>
            </form>
        </div>
    </div>

    <div class="login-right">
        <div class="slider-box">
            <div id="imageSlider" class="carousel slide carousel-fade h-100 w-100" data-bs-ride="carousel"
                data-bs-interval="5000">
                <div class="carousel-inner h-100 w-100">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/slider/slider1.jpg') }}" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slider/slider2.jpg') }}" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slider/slider3.jpg') }}" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slider/slider4.jpg') }}" alt="Slide 4">
                    </div>
                </div>
                <div class="carousel-indicators mb-3">
                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="3"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    function togglePassword(el) {
        const input = document.querySelector('#password');
        const icon = el.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection