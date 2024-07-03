<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Traits\ModelHelperTrait;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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

        $data = $modelClass::with($this->getRelationships($modelClass))->find($id);

    
        if ($modelClass) {    

            if($request->type == 1){
                $data = $modelClass::with($this->getRelationships($modelClass))->with('items.product')->find($id);
    
                return response()->json(['status'=> true , 'data'=> $data], 201);
            }

            
            if($view == "representatices_days.day"){
                $date = $request->date;
                $formattedDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
                
                //dd($formattedDate);
                $data = $modelClass::with($this->getRelationships($modelClass))->find($id)->get();
                
                return view($view, compact('data' , 'formattedDate'));
            }


            if($view == "delivery.edit"){
                // Determine the model class based on the table name
                $modelClass = $this->getModelClass("representatives");
                $modelClass2 = $this->getModelClass("offers");
            
                if ($modelClass) {
                // Eager load relationships based on the model class
                $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
                }
                return view($view, compact('data' , 'withData' , 'withData2'));  
            }
        

            if($view == "offers.edit"){ 
            // Eager load relationships based on the model class
            $data = $modelClass::with($this->getRelationships($modelClass))
            ->with('items.product') // Eager load items and their related products
            ->find($id);

                $modelClass = $this->getModelClass("clients");
                $modelClass2 = $this->getModelClass("products");
                if ($modelClass) {
                    $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                    $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
                }          
                return view($view, compact('data' , 'withData' , 'withData2'));  
            }

            if($view == "money.expenses.edit" || $view == "money.revenues.edit"){
        
                // Determine the model class based on the table name
                $modelClass = $this->getModelClass("representatives");
            
                if ($modelClass) {
                // Eager load relationships based on the model class
                $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                }
                return view($view, compact('data' , 'withData'));
            }
        
            if($view == "procedures.discounts.edit" || $view == "procedures.rewards.edit"){
        
                // Determine the model class based on the table name
                $modelClass = $this->getModelClass("employees");
            
                if ($modelClass) {
                // Eager load relationships based on the model class
                $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                
                }
                return view($view, compact('data','withData'));
            }

            if($view == "attendance.attendance.edit" || $view == "attendance.abcense.edit"){
        
                // Determine the model class based on the table name
                $modelClass = $this->getModelClass("employees");
            
                if ($modelClass) {
                // Eager load relationships based on the model class
                $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                
                }
                return view($view, compact('data','withData'));
            }
        
            if($view == "invoices.edit"){ 
            
            // Eager load relationships based on the model class
            $data = $modelClass::with($this->getRelationships($modelClass))
            ->with('items.product') // Eager load items and their related products
            ->find($id);

                $modelClass = $this->getModelClass("suppliers");
                $modelClass2 = $this->getModelClass("products");
                if ($modelClass) {
                    $withData = $modelClass::with($this->getRelationships($modelClass))->get();
                    $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
                }          
                return view($view, compact('data' , 'withData' , 'withData2'));  
            }
    
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

        if ($request->has('name')) {
            $rules['name'] = ['required', 'string', 'max:255'];
        }
        if ($request->has('phone')) {
            $rules['phone'] = [
                'required',
                'string',
                'min:11',
                Rule::unique($table)->ignore($data->id)
            ];
        }
                if ($request->has('address')) {
            $rules['address'] = ['required', 'string'];
        }
        if ($request->has('salary')) {
            $rules['salary'] = ['required'];
        }
        if ($request->has('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
            $rules['password_confirmation'] = ['required', 'string', 'min:8'];
        }
        if ($request->hasFile('image')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }
        if ($request->has('offer_id')) {
            $rules['offer_id'] = ['required'];
        }
        if ($request->has('product_id')) {
            $rules['product_id'] = ['required'];
        }
        if ($request->has('employee_id')) {
            $rules['employee_id'] = ['required'];
        }
        if ($request->has('representative_id')) {
            $rules['representative_id'] = ['required'];
        }
        if ($request->has('line')) {
            $rules['line'] = ['required', 'string'];
        }
        if ($request->has('description')) {
            $rules['description'] = ['required'];
        }
        if ($request->has('quantity')) {
            $rules['quantity'] = ['required'];
        }
    
        $messages = [
            'name.required' => 'الاسم مطلوب.',
            'address.required' => 'العنوان مطلوب.',
            'salary.required' => 'الراتب مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا.',
            'phone.required' => 'رقم التليفون مطلوب.',
            'phone.string' => 'رقم التليفون يجب أن يكون نصًا.',
            'phone.min' => 'رقم التليفون لا يمكن أن يقل عن 11 رقما.',
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
            'image.max' => 'الصورة لا يمكن أن تتجاوز 2 ميغابايت.',
            'offer_id.required' => 'رقم العرض مطلوب.',
            'product_id.required' => 'رقم العرض مطلوب.',
            'employee_id.required' => 'رقم الموظف مطلوب.',
            'representative_id.required' => 'المندوب مطلوب.',
            'line.required' => 'خط السير مطلوب.',
            'line.string' => 'خط السير يجب أن يكون نصًا.',
            'quantity.required' => 'الكمية مطلوبة.',
            'description.required' => 'الوصف مطلوب.',
            'offer_id.not_in' => 'رقم العرض مطلوب.',
            'representative_id.not_in' => 'المندوب مطلوب.',
        ];
    
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

        if ($requestData['table'] == 'users') {
            $requestData['password'] = Hash::make($requestData['password']);
        }

        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Check if there is an existing image and delete it
            if ($data && $data->image) {
                $existingImagePath = public_path($data->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();

            // Define the destination path in the public directory
            $destinationPath = public_path('images/' . $table);

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the uploaded file to the 'public/images/sections' directory with the generated filename
            $request->file('image')->move($destinationPath, $fileName);

            // Merge the filename with request data
            $requestData = array_merge($request->all(), ['image' => 'images/' . $table . '/' . $fileName]);
        }

        // Format created_at and updated_at fields
        $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
        $updated_at = now();

        $requestData['created_at'] = $created_at;
        $requestData['updated_at'] = $updated_at;

        
        unset($requestData['table']);
        unset($requestData['password_confirmation']);

        if ($data) {
            DB::table($table)->where('id', $request->id)->update($requestData);
            if($table == "offers"){
                DB::table("offer_items")->where("offer_id" , $data->id)->delete();
                DB::table("returns")->where("offer_id" , $data->id)->delete();
            }
            if($table == "invoices"){
                DB::table("invoice_items")->where("invoice_id" , $data->id)->delete();
            }
        } else {
            return response()->json(['message' => 'not found'], 404);
        }
        return response()->json(['status' => true, "message" => "تم تعديل بيانات المشرف بنجاح"], 201);
    }
}
