<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Traits\ModelHelperTrait;

class CreateController extends Controller
{
    use ModelHelperTrait;

    public function add(Request $request)
    {
        $view = $request->view;
        $withData =[];

        if($view == "offers.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("clients");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        }
    }

        return view($view, compact('withData'));
}


    public function create(Request $request)
    {
        $table = $request->table;
        
        // Initialize validation rules array
        $rules = [];
    
        // Add rules conditionally based on the existence of the fields in the request
        if ($request->has('name')) {
            $rules['name'] = ['required' ,'string' ,'max:255'];
        }
        if ($request->has('phone')) {
            $rules['phone'] = ['required' ,'string' ,'min:11' , 'max:11' , 'unique:' . $table];
        }
        if ($request->has('password')) {
            $rules['password'] = ['required', 'string','min:8','confirmed'];
            $rules['password_confirmation'] = ['required','string','min:8'];
        }
        if ($request->hasFile('image')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        $messages = [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا.',
            'phone.required' => 'رقم التليفون مطلوب.',
            'phone.string' => 'رقم التليفون يجب أن يكون نصًا.',
            'phone.max' => 'رقم التليفون لا يمكن أن يتجاوز 11 رقما.',
            'phone.max' => 'رقم التليفون لا يمكن أن يقل عن 11 رقما.',
            'phone.unique' => 'رقم التليفون مسجل مسبقًا.',
            'password.required' => 'كلمة السر مطلوبة.',
            'password.string' => 'كلمة السر يجب أن تكون نصًا.',
            'password.min' => 'كلمة السر يجب أن تكون على الأقل 8 أحرف.',
            'password.confirmed' => 'كلمة السر وتأكيد كلمة السر غير متطابقين.',
            'password_confirmation.required' => 'تأكيد كلمة السر مطلوب.',
            'password_confirmation.string' => 'تأكيد كلمة السر يجب أن يكون نصًا.',
            'password_confirmation.min' => 'تأكيد كلمة السر يجب أن تكون على الأقل 8 أحرف.',
            'image.image' => 'الملف يجب أن يكون صورة.',
            'image.mimes' => 'الصورة يجب أن تكون بامتداد: jpeg, png, jpg, gif, svg.',
            'image.max' => 'الصورة لا يمكن أن تتجاوز 2 ميغابايت.'
        ];
                
        // Create a validator instance and validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity status code
        }
    
        // Initialize $fileName variable
        $fileName = null;
    
        // Merge the filename with request data
        $requestData = $request->all();
    
        if(isset($requestData['password'])) {
            $requestData['password'] = Hash::make($requestData['password']);
        }
        
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
        unset($requestData['password_confirmation']);
    
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
        return response()->json(['status'=>true , "message"=>"تم اضافة المشرف بنجاح"], 201);
    }
}
