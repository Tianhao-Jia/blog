<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <li class=" d-flex" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a class="flex-shrink-0" href="{{ route('users.show', [$reply->user_id] )}}">
          <img src="{{ $reply->user->gravatar() }}" alt="{{ $reply->user->name }}" class="me-1 gravatar"/>
        </a>
      </div>

      <div class="flex-grow-1 ms-2">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a class="text-decoration-none" href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
            {{ $reply->user->name }}
          </a>
          <span class="text-secondary"> • </span>
          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

          @can('destroy',$reply)
          <span class="meta float-end ">
            <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete');">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Delete</button>
            </form>
          </span>
          @endcan
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>

    @if ( ! $loop->last)
      <hr>
    @endif

  @endforeach
</ul>
