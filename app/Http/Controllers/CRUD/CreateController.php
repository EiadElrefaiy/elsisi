<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Traits\ModelHelperTrait;
use Carbon\Carbon;

class CreateController extends Controller
{
    use ModelHelperTrait;

    public function add(Request $request)
    {
        $view = $request->view;
        $withData =[];
        $withData2 =[];

        if($view == "delivery.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("representatives");
        $modelClass2 = $this->getModelClass("offers");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
        }
        
        return view($view, compact('withData' , 'withData2'));
    }

        if($view == "offers.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("clients");
        $modelClass2 = $this->getModelClass("products");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
        }
        return view($view, compact('withData' , 'withData2'));
    }

        if($view == "invoices.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("suppliers");
        $modelClass2 = $this->getModelClass("products");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        $withData2 = $modelClass2::with($this->getRelationships($modelClass2))->get();
        }
        return view($view, compact('withData' , 'withData2'));
    }

        if($view == "returns.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("offers");
        
        $deliveriesModel = $this->getModelClass("delivery");

        if ($modelClass && $deliveriesModel) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        $deliveries = $deliveriesModel::get();
        
        }
        return view($view, compact('withData' , 'deliveries'));
    }

        if($view == "procedures.discounts.add" || $view == "procedures.rewards.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("employees");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        
        }
        return view($view, compact('withData'));
    }


        if($view == "attendance.attendance.add" || $view == "attendance.abcense.add"){
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass("employees");
    
        if ($modelClass) {
        // Eager load relationships based on the model class
        $withData = $modelClass::with($this->getRelationships($modelClass))->get();
        
        }
        return view($view, compact('withData'));
    }

        return view($view);
}


public function create(Request $request)
{
    $table = $request->table;
    
    // Initialize validation rules array
    $rules = [];
    
    // Add rules conditionally based on the existence of the fields in the request
    if ($request->has('name')) {
        $rules['name'] = ['required', 'string', 'max:255'];
    }
    if ($request->has('phone')) {
        $rules['phone'] = ['required', 'string', 'min:11', 'max:11', 'unique:' . $table];
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
    if ($request->has('price')) {
        $rules['price'] = ['required'];
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
        'phone.max' => 'رقم التليفون لا يمكن أن يتجاوز 11 رقما.',
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
        'price.required' => 'السعر مطلوب.',
        'quantity.required' => 'الكمية مطلوبة.',
        'description.required' => 'الوصف مطلوب.',
        'offer_id.not_in' => 'رقم العرض مطلوب.',
        'representative_id.not_in' => 'المندوب مطلوب.',
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

    if (isset($requestData['password'])) {
        $requestData['password'] = Hash::make($requestData['password']);
    }

    // Check if the request contains a file named 'image'
    if ($request->hasFile('image')) {
        // Generate a unique filename based on current time and file extension
        $fileName = time() . '.' . $request->file('image')->extension();

        // Store the uploaded file in the 'public/images/sections' directory with the generated filename
        $request->file('image')->storeAs('public/images/' . $table, $fileName);

        // Merge the filename with request data
        $requestData['image'] = 'images/' . $table . '/' . $fileName;
    }

        // Format created_at and updated_at fields
        $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
        $updated_at = now();

        $requestData['created_at'] = $created_at;
        $requestData['updated_at'] = $updated_at;

    unset($requestData['table']);
    unset($requestData['password_confirmation']);

    // Insert data into database using DB facade
    $record = DB::table($table)->insert($requestData);

    // Get the ID of the last inserted record
    $lastInsertedId = DB::getPdo()->lastInsertId();

    // Fetch the inserted record from the database
    $data = DB::table($table)->find($lastInsertedId);

    // Return success response
    return response()->json(['status' => true, 'data' => $data], 201);
  }
}
