@extends('layouts.default')
@section('title', 'All users')

@section('content')
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center">All users</h2>
  <div class="list-group list-group-flush">
    @foreach ($users as $user)
      <div class="list-group-item">
        @include('users._user')
      </div>
    @endforeach
  </div>
  <div class="mt-3">
    {!! $users->render() !!}
  </div>
</div>
@stop
