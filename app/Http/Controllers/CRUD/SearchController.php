<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Traits\ModelHelperTrait;

class SearchController extends Controller
{
    use ModelHelperTrait;
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $table = $request->input('table');
        
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass($table);
        
        if (!$modelClass) {
            return response()->json(['error' => 'Model not found'], 404);
        }
    
        // Create an instance of the model
        $modelInstance = new $modelClass;
        
        // Get the columns of the table
        $columns = Schema::getColumnListing($modelInstance->getTable());
        
        // Prepare the query
        $searchQuery = $modelClass::query();
        
        // Build the search conditions
        foreach ($columns as $column) {
            $searchQuery->orWhere($column, 'LIKE', '%' . $query . '%');
        }
        
        // Include related models using eager loading
        $relationships = $this->getRelationships($modelClass);
        if (!empty($relationships)) {
            $searchQuery->with($relationships);
        }
        
        // Execute the query
        $results = $searchQuery->get();
    
        if ($results->isEmpty()) {
            return response()->json(['message' => 'No results found'], 404);
        }
    
        return response()->json(['results' => $results], 200);
    }
}
