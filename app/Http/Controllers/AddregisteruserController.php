<?php

namespace App\Http\Controllers;
use App\Adduser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AddregisteruserController extends Controller
{
    //
    public function adduser(Request $request)
    {
            $adduser = new Adduser;
            $adduser->name = $request->username;
            $adduser->role = $request->role;
            $adduser->password = Hash::make($request->password);
            $adduser->save();
            return view('loginbackoffice');
            
    }
}
