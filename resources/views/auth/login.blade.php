@extends('master')

@section('content')
    <div class="container h-100">
        <div class="row  align-items-center justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 text-left">
                                <div class="p-5">
                                    <h1 class="login-title pb-4">Prihlásenie</h1>
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label m-0">Emailová adresa</label>
                                            <input id="email" type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label m-0">Heslo</label>
                                            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Zapamätať prihlásenie') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 p-0">
                                            <input type="submit" class="btn btn-custom btn-custom-blue mt-2" value="Prihlásiť sa">
                                        </div>


                                        @if (Route::has('password.request'))
                                            <a class="text-dark pt-2" href="{{ route('password.request') }}">
                                                {{ __('Zabudnuté heslo?') }}
                                            </a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
