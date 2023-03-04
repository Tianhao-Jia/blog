@extends('layouts.default')
@section('title', 'Update Profile')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update Profile</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <div class="gravatar_edit">
          <a href="http://gravatar.com/emails" target="_blank">
            <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
          </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="mb-3">
              <label for="name">Name:</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
              <label for="email">Email:</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="mb-3">
              <label for="password">Password:</label>
              <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="mb-3">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
@stop
