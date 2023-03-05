@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
    <div class="bg-light p-3 p-sm-5 rounded">
      <h1>Hello Laravel</h1>
      <p class="lead">
        You can see <a href="https://learnku.com/courses/laravel-essential-training">Blog</a> Page。
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
