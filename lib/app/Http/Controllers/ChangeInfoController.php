<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeInfoController extends Controller
{
    public function getChangeInfo()
    {
        return view('frontend.change-info');
    }

    public function updateInfo(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->intended('/homepage');
    }
}
