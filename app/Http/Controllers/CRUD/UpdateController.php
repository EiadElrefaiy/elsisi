<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Traits\ModelHelperTrait;

class UpdateController extends Controller
{
    use ModelHelperTrait;

    public function edit(Request $request)
    {
        $view = $request->view;
        $table = $request->table;
        $id = $request->id;

        // Determine the model class based on the table name
        $modelClass = $this->getModelClass($table);

        if ($modelClass) {
            // Eager load relationships based on the model class
            $data = $modelClass::with($this->getRelationships($modelClass))->find($id);

            // Return success response with the view and data
            return view($view, compact('data'));
        } else {
            // Handle the case where the model class is not found
            return response()->json(['error' => 'Model not found'], 404);
        }

        return view($view, compact('data'));
    }

    public function update(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        $data = DB::table($table)->find($request->id);

        // Initialize validation rules array
        $rules = [];

        // Add rules conditionally based on the existence of the fields in the request
        if ($request->has('name')) {
            $rules['name'] = ['required', 'string', 'max:255'];
        }
        if ($request->has('phone')) {
            $rules['phone'] = ['required', 'string', 'max:15'];
        }
        if ($request->has('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
            $rules['password_confirmation'] = ['required', 'string', 'min:8'];
        }
        if ($request->hasFile('image')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        // Create a validator instance and validate the request
        $validator = Validator::make($request->all(), $rules);

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

        if (isset($requestData['password'])) {
            $requestData['password'] = Hash::make($requestData['password']);
        }

        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Check if there is an existing image and delete it
            if ($data && $data->image) {
                $existingImagePath = storage_path('app/public/' . $data->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();

            // Store the uploaded file in the 'public/images/sections' directory with the generated filename
            $request->file('image')->storeAs('public/images/' . $table, $fileName);

            // Merge the filename with request data
            $requestData = array_merge($request->all(), ['image' => 'images/' . $table . '/' . $fileName]);
        }

        unset($requestData['table']);
        unset($requestData['password_confirmation']);

        if ($data) {
            DB::table($table)->where('id', $request->id)->update(array_merge($requestData, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        } else {
            return response()->json(['message' => 'not found'], 404);
        }
        return response()->json(['status' => true, "message" => "تم تعديل بيانات المشرف بنجاح"], 201);
    }
}
