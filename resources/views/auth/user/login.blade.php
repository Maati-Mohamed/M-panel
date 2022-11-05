@extends('layouts.front.app')
@section('title')
@lang('Login')
@endsection
@section('content')

<div class="user-form d-flex justify-content-center align-items-center">
    <form action="{{ route('login') }}" method="post" class="theme">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" name="email" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" name="password" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
            <p>Login with :</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="bi bi-facebook"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="bi bi-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="bi bi-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="bi bi-github"></i>
            </button>
        </div>
    </form>
</div>
@endsection