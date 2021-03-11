@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="display-5 mb-5 text-center">Sign up</h5>
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First name</label>
                            <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" type="text" name="firstname" value="{{ old('firstname') }}" />
                            @if ($errors->has('firstname'))
                                <p class="invalid-feedback">{{ $errors->first('firstname') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last name</label>
                            <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" type="text" name="lastname" value="{{ old('lastname') }}" />
                            @if ($errors->has('lastname'))
                                <p class="invalid-feedback">{{ $errors->first('lastname') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{ old('email') }}" />
                        @if ($errors->has('email'))
                            <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" />
                        @if ($errors->has('password'))
                            <p class="invalid-feedback">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password confirmation</label>
                        <input class="form-control" type="password" name="password_confirmation" />
                    </div>
                    <div class="mb-5">
                        <div class="form-check">
                            <input class="form-check-input{{ $errors->has('terms') ? ' is-invalid' : '' }}" type="checkbox" value="1" name="terms" id="terms" {{ old('terms') !== null ? 'checked' : '' }}>
                            <label class="form-check-label" for="terms">
                                Agree to terms and conditions
                            </label>
                            @if ($errors->has('terms'))
                                <p class="invalid-feedback">{{ $errors->first('terms') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-lg btn-primary" type="submit">Register</button>
                    </div>
                    <p class="text-center mb-0">Already have an account? <a href="{{ route('auth.login') }}">Sign in here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


