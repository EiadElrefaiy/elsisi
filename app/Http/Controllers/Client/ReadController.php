<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ReadController extends Controller
{
    public function index(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        $data = DB::table($table)->get();

        // Return success response
        return view($table);

    }

    public function read(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        $data = DB::table($table)->find($request->id);

        // Return success response
        return view($table . '_info' ,compact('data'));
    }
}
