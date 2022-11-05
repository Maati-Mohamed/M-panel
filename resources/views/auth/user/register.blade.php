@extends('layouts.front.app')
@section('title')
@lang('Register')
@endsection
@section('content')
<div class="user-form d-flex justify-content-center align-items-center ">
    <form action="{{ route('register') }}" method="post" class="theme">
        @csrf
        <!-- name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Name</label>
            <input type="text" id="form2Example1" name="name" class="form-control" />

        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" name="email" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" name="password" class="form-control" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password confirm</label>
            <input type="password" id="form2Example2" name="password_confirmation" class="form-control" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" name="remeber" for="form2Example31"> Remember me </label>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p> with :</p>
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