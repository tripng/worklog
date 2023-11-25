@extends('layouts.app')
@section('title','Login')

@section('content')
<div class="container login-page">
    <div class="row justify-content-center align-item-center">
        <div class="card col-6">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="row justify-content-end login mt-4 me-2">
                        <button type="submit" class="col-2 btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection