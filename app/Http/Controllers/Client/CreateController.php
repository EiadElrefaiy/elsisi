<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function create(Request $request)
    {
        $table = $request->table;
        // Initialize $fileName variable
        $fileName = null;
    
        // Merge the filename with request data
        $requestData = $request->all();

        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();
            
            // Store the uploaded file in the 'public/images/sections' directory with the generated filename
            $request->file('image')->storeAs('public/images/'.$table, $fileName);

        // Merge the filename with request data
        $requestData = array_merge($request->all(), ['image' => 'images/'.$table.'/'.$fileName]);
        }
    
        unset($requestData['table']);

        // Insert data into database using DB facade
        $record = DB::table($table)->insert(array_merge($requestData, [
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        // Get the ID of the last inserted record
        $lastInsertedId = DB::getPdo()->lastInsertId();

        // Fetch the inserted record from the database
        $data = DB::table($table)->find($lastInsertedId);

        // Return success response
        return view($table);
    }
}
