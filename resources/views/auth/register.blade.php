@extends('layout.app')

@section('title', 'Registration')

@section('content')

    <div class="d-flex gap-5 justify-content-center">
        <div class="auth-form">
            <h1>Registration</h1>
            <form method="POST" action="{{ route("register.process") }}">
                @csrf
                <div class="form-outline mb-4">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
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
                <div class="form-outline mb-4">
                    <label for="exampleInputPassword1Confirmation" class="form-label">Password confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1Confirmation">
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
