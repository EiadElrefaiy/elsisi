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

        $money = $this->getModelClass("money");
    
        if ($modelClass) {
            // Eager load relationships based on the model class
            $data = $modelClass::with($this->getRelationships($modelClass))->get();

            if ($view == "offers.index") {
                $returnsModel = $this->getModelClass("returns");
                $returns = $returnsModel::get();
                return view($view, compact('data' , 'returns'));
            }
    
            if ($view == "returns.index") {
              $deliveriesModel = $this->getModelClass("delivery");
              $deliveries = $deliveriesModel::get();
              return view($view, compact('data' , 'deliveries'));
            }

            if ($view == "representatices_days.index") {
                // Fetch all unique dates for which there is representative data
                $uniqueDates = $money::selectRaw('DATE(created_at) as date')
                    ->distinct()
                    ->pluck('date')
                    ->toArray();
                
                // Initialize an array to store the data for each date
                $representativesByDate = [];
        
                // Loop through each unique date
                foreach ($uniqueDates as $date) {
                    // Fetch representatives with associated money data for the current date
                    $representatives = $modelClass::with(['money' => function ($query) use ($date) {
                        // Filter money records for the current date
                        $query->whereDate('created_at', $date);
                    }])
                    ->whereHas('money', function ($query) use ($date) {
                        // Check if money records exist for the current date
                        $query->whereDate('created_at', $date);
                    })
                    ->get();
        
                    // Store the representatives data for the current date
                    $representativesByDate[$date] = $representatives;
                }
         
                // Pass the data to the view
                return view($view, compact('representativesByDate'));
            }
        
            if ($request->ajax() && $request->type == "day_search") {
                $date = $request->input('date');
                $formattedDate = \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');
        
                $data = $modelClass::with($this->getRelationships($modelClass))->whereDate('created_at', $formattedDate)->get();
        
                return view('representatices_days.tableRows', compact('data'))->render();
            }
                        
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
        $view = $request->view;
        $id = $request->id;

        $modelClass = $this->getModelClass($table);
        $data = $modelClass::with($this->getRelationships($modelClass))->find($id);

        // Return success response
        return view($view, compact('data'));
    }
}
