<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class readController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all admins from the database
        $admins = User::get();

        return view('management' ,compact('admins'));
    }

    public function read(Request $request)
    {
        // Retrieve admin from the database
        $admin = User::find($request->id);

        return view('management' ,compact('admin'));
    }
}
