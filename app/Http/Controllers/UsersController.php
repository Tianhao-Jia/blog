<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        //middleware auth, use with except which let only user login can see the page, but except the page qoute in 'except' session.
        $this->middleware('auth', [
            'except' => ['show','create', 'store','index']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index()
    {
        //paginate, which let the users details devided which each page has 6 users
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }
    public function create(){
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        //$request is the input from the user
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success', 'Welcome to my blog platform');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50|unique:users,name,'.$user->id,
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        //open a new flash session, and if get 'success', then alert the context and redirct to the show page.
        session()->flash('success', 'Profile update success!');


        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        //Use the UserPolicy.php's method 'destroy', let only admin can destroy the users
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', 'User already delete');
        return back();
    }


}
