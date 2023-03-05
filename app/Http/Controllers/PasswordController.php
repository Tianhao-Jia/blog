<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // verfiy the email
        $request->validate(['email' => 'required|email']);
        $email = $request->email;

        // get the user
        $user = User::where("email", $email)->first();

        // If not exit
        if (is_null($user)) {
            session()->flash('danger', 'email not exit');
            return redirect()->back()->withInput();
        }

        // Create the token, the toke will add on the view emails.reset_link
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        // 5. Add in database, use updateOrInsert to keep email unique
        DB::table('password_resets')->updateOrInsert(['email' => $email], [
            'email' => $email,
            //hash again, to make sure the token in database is different with the token generated
            'token' => Hash::make($token),
            'created_at' => new Carbon,
        ]);

        // 6. sent token to the user
        Mail::send('emails.reset_link', compact('token'), function ($message) use ($email) {
            $message->to($email)->subject("Forget password");
        });

        session()->flash('success', 'Reset email sent successful, please check you email box');
        return redirect()->back();
    }
}
