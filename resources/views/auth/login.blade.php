@extends('layout.app')
@section('content')
    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card p-3">
            <h2 class="text-center mb-4">Login</h2>
            @if(Session::has('error'))
                <p class="text-danger">{{Session::get('error')}}</p>
            @endif
            @if(Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
            @endif
            <form action="{{route('login')}}" method="post">
                @csrf
                @method('post')
                <div class="form-group m-2">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter your username">
                </div>
                <div class="form-group m-2">
                    <label for="password" class="fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary btn-block m-2">Login</button>
            </form>
        </div>
    </div>
@endsection
