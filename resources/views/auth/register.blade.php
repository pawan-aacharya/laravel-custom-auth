@extends('layout.app')
@section('content')
    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card p-3">
            <h2 class="text-center mb-4">register</h2>
            @if (Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="name" class="fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter your name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group m-2">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" class="form-control" id="name" name="email" value="{{ old('email') }}"
                        placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group m-2">
                    <label for="password" class="fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group m-2">
                    <label for="password" class="fw-bold">Retype Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation"
                        placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary btn-block m-2">
                    Register
                </button>
            </form>
        </div>
    </div>
@endsection
