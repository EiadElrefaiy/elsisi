<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        $data = DB::table($table)->find($request->id);

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

            // Delete previous image if exists
            if ($data->image) {
                Storage::delete('public/'.$data->image);
            }
            
            // Update section's image path
            $data->image = 'images/'.$table.'/'.$fileName;

        // Merge the filename with request data
        $requestData = array_merge($request->all(), ['image' => 'images/'.$table.'/'.$fileName]);
        }
    
        unset($requestData['table']);
        
        if ($data) {
            DB::table($table)->where('id', $request->id)->update(array_merge($requestData, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }else{
            return response()->json(['message'=> 'not found'], 404);
        }
        return redirect($table . '_info')->with('messsage' , 'تم التعديل بنجاح');
    }
}
