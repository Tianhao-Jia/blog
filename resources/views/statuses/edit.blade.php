@extends('layouts.default')
@section('title', 'Update Profile')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update blog</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')


        <form method="POST" action="{{ route('statuses.update', $status->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="mb-3">
              <label for="content">Enter your update messages</label>
              <input type="text" name="content" class="form-control" value="{{ $status->content }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
</div>
@stop
