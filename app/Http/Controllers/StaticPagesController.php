<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
class StaticPagesController extends Controller
{
    public function home(){
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }

        return view('static_pages/home', compact('feed_items'));
    }

    public function about(){
        return view('static_pages/about');

    }

    public function help(){
        return view('static_pages/help');
    }


}
