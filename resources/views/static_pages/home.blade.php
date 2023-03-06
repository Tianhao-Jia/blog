@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h4>Blog List</h4>
        <hr>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
    <div class="bg-light p-3 p-sm-5 rounded myself">
      <h1>Hello, welcome to Myblog, Sign up to see other users' blog and create your own blog!</h1>
      <p class="lead">
        You can see <a href="https://learnku.com/courses/laravel-essential-training">My personal websit</a> by click this。
      </p>
      <p>
        Everything start here
      </p>
      <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Register now</a>
      </p>
    </div>
  @endif
@stop
