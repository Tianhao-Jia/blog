<li class="d-flex mt-4 mb-4">
  <a class="flex-shrink-0" href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="me-1 gravatar"/>
  </a>
  <div class="flex-grow-1 ms-3">
    <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $status->created_at->diffForHumans() }}</small></h5>
    {{ $status->content }}
    @include('statuses._reply_box', ['status' => $status])
    @include('statuses._reply_list', ['replies' => $status->replies()->with('user')->get()])

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
