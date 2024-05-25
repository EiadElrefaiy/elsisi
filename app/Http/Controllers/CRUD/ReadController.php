<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ModelHelperTrait;

class ReadController extends Controller
{
    use ModelHelperTrait;
    
    public function index(Request $request)
    {
        $table = $request->table;
        $view = $request->view;
    
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass($table);
    
        if ($modelClass) {
            // Eager load relationships based on the model class
            $data = $modelClass::with($this->getRelationships($modelClass))->get();
    
            // Return success response with the view and data
            return view($view, compact('data'));
        } else {
            // Handle the case where the model class is not found
            return response()->json(['error' => 'Model not found'], 404);
        }
    }

    public function read(Request $request)
    {
        $table = $request->table;
        $view = $request->view;

        // Get Record from the database
        $data = DB::table($table)->find($request->id);

        // Return success response
        return view($view, compact('data'));
    }

    public function offer_print(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        //$data = DB::table($table)->find($request->id);
        $data = null;

        // Return success response
        return view('offers.offer_print', compact('data'));
    }
}
