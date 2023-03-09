<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        session()->flash('success', 'Create successed');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', 'Blog delete successed!');
        return redirect()->back();
    }

    public function edit(Status $status)
    {
        $this->authorize('update', $status);
        return view('statuses.edit', compact('status'));
    }

    public function update(Status $status, Request $request)
    {
        $this->authorize('update', $status);
        $this->validate($request, [
            'content' => 'required|max:140'.$status->id
        ]);

        $data = [];
        $data['content'] = $request->content;

        $status->update($data);
        //open a new flash session, and if get 'success', then alert the context and redirct to the show page.
        session()->flash('success', 'Blog update success!');


        return redirect()->route('users.show',Auth::user());
    }

}
