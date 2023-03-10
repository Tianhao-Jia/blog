<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140|min:2'

        ]);

        Auth::user()->replies()->create([
            'content' => $request['content'],
            'user_id' => Auth::id(),
            'status_id' =>$request->status_id,
        ]);
        session()->flash('success', 'Create successed');
        return redirect()->back();
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();
        session()->flash('success', 'Blog delete successed!');
        return redirect()->back();
    }
}
