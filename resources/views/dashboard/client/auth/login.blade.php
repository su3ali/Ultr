@extends('dashboard.layout.guest')

@section('content')
<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">

            {{-- Logo --}}
            <div class="text-center">
                @php $settings = \App\Models\Setting::first(); @endphp
                @if($settings && $settings->logo)
                <img src="{{ asset($settings->logo) }}" class="flag-width" alt="logo"
                    style="width: 150px; margin-top: 33px" />
                @endif
            </div>

            <div class="form-container">
                <div class="form-content">

                    <h1>{{ __('dash.login') }}</h1>
                    <p>{{ __('dash.login_to_your_account') }}</p>

                    {{-- Show session message --}}
                    @if(session('message'))
                    <div class="{{ session('class') }} mb-2 text-center">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form class="text-left" method="POST" action="#">
                        
                        @csrf
                        <div class="form">

                            {{-- Email --}}
                            <div id="username-field" class="field-wrapper input">
                                <label for="email">{{ __('dash.email') }}</label>
                                <i class="feather feather-user"></i>
                                <input id="email" name="email" type="email" class="form-control"
                                    value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">{{ __('dash.password') }}</label>
                                    <a href="#" class="forgot-pass-link">
                                        {{ __('dash.forgot_password') }}
                                    </a>
                                </div>
                                <i class="feather feather-lock"></i>
                                <input id="password" name="password" type="password" class="form-control" required>
                                <i id="toggle-password" class="feather feather-eye"></i>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Remember Me --}}
                            <div class="field-wrapper text-center keep-logged-in">
                                <div class="n-chk new-checkbox checkbox-outline-primary text-left py-2">
                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                        <input type="checkbox" name="remember_me" class="new-control-input">
                                        <span class="new-control-indicator"></span>{{ __('dash.remember_me') }}
                                    </label>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('dash.login') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection