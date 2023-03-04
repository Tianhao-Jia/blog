@extends('layouts.default')

@section('content')
  <div class="bg-light p-3 p-sm-5 rounded">
    <h1>Welcome to Myblog, try signup and start your first blog</h1>
    <p class="lead">
      There is a link for <a href="http://120.79.136.111">my website</a> 。
    </p>
    <p>
      Everything is start here, author by Tianhao Jia.
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">Register Now</a>
    </p>
  </div>
@stop
