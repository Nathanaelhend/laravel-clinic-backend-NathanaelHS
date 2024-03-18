<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('doctor_name'), function($query,$name){
                return $query->where('doctor_name','like','%' . $name . '%');
            })
            ->orderBy('id','desc')
            ->get();

        return response()->json([
            'data' => $doctors,
            'message' => 'Success',
            'status' => 'OK'
        ], 200);
    }
}
