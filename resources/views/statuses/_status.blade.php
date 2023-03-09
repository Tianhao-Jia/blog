<li class="d-flex mt-4 mb-4">
  <a class="flex-shrink-0" href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="me-1 gravatar"/>
  </a>
  <div class="flex-grow-1 ms-3">
    <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $status->created_at->diffForHumans() }}</small></h5>
    {{ $status->content }}
    <div class="reply-box">
      <form  method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $status->id }}">
        <div class="mb-3">
          <textarea class="form-control" rows="3" placeholder="Leave your comments" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> Reply</button>
      </form>
    </div>
  </div>

  @can('destroy', $status)
    <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Delete</button>
    </form>
    <br>

  @endcan

  @can('update', $status)
  &ensp;
  <form action="{{ route('statuses.edit', $status->id) }}" method="GET">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Update</button>
  </form>
  @endcan
</li>
