@extends('layout.app')

@section('title', 'Authorization')

@section('content')
    <div class="content">
        <h1>Login</h1>

        <form method="POST" action="{{ route("login_process") }}">
            @csrf
            <div class="form-outline mb-4">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div>
                <a href="{{ route("register") }}" class="">Registration</a>
            </div>
        </form>
    </div>
@endsection
