<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        $table = $request->table;

        // Delete record from the database
        $deleted = DB::table($table)->where('id', $request->id)->delete();

        if ($deleted) {
            // If the record was successfully deleted
            return response()->json(['message' => 'تم الحذف بنجاح'], 200);
        } else {
            // If the record was not found or couldn't be deleted
            return response()->json(['message' => 'هذا العنصر غير موجود'], 404);
        }
    }
}
