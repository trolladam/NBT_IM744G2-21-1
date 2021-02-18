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
                            <input class="form-control" type="text" name="firstname" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last name</label>
                            <input class="form-control" type="text" name="lastname" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password confirmation</label>
                        <input class="form-control" type="password" name="password_conf" />
                    </div>
                    <div class="mb-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="terms" id="terms">
                            <label class="form-check-label" for="terms">
                                I read and understand the Terms and conditions
                            </label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-lg btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
