@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="display-5 mb-5 text-center">Sign in</h5>
                @if ($errors->count())
                    <div class="alert alert-danger pb-0">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="text" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="mb-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me" {{ old('remember_me') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember_me">
                                Rembember me
                            </label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
