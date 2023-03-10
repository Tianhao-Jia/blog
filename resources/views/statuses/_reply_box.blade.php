@include('shared._errors')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="status_id" value="{{ $status->id }}">
    <div class="mb-3">
      <textarea class="form-control" rows="3" placeholder="Leave your comment...." name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> Reply</button>
  </form>
</div>
<hr>
