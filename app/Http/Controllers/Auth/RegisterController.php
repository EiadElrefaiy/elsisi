<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'name' => ['required','string','max:255'],
        'phone' =>['required','string','max:255','unique:admins'],
        'password' => ['required','string','min:6','confirmed'],
        'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'position' => ['required','integer'],
    ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Return validation errors as JSON response with status code 422 (Unprocessable Entity)
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Initialize $fileName variable
        $fileName = null;
    
        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();
            
            // Store the uploaded file in the 'public/images/users' directory with the generated filename
            $request->file('image')->storeAs('public/images/users', $fileName);
        }
    
            // Create a new user record in the database
            $admin = Admin::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'position' => $request->position,
                'image' =>'images/users/'.$fileName,
                'password' => bcrypt($request->password),
            ]);
    
            return view('index');
 }
}
