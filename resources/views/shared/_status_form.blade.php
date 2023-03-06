<form action="{{ route('statuses.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="Talk about something" name="content">{{ old('content') }}</textarea>
  <div class="text-end">
      <button type="submit" class="btn btn-primary mt-3">Post</button>
  </div>
</form>
