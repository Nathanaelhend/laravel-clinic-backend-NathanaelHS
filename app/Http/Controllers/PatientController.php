<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //
    public function index(Request $request)
    {
        $patients = DB::table('patients')
            ->when($request->input('nik'), function($query,$name){
                return $query->where('nik','like','%' . $name . '%');
            })
            ->orderBy('id','desc')
            ->paginate(10);
        return view('pages.patients.index', compact('patients'));
    }
}
