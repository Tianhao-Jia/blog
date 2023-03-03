@extends('layouts.default')
@section('title', 'Signup')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Sign up</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')
      <form method="POST" action="{{ route('users.store') }}">
          {{ csrf_field() }}
          <div class="mb-3">
            <label for="name">User name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="mb-3">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>
</div>
@stop
