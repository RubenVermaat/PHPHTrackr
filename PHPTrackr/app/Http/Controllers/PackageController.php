<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create()
    {
        
        $data = Package::paginate(6);
        return view('adminpanel', ['data'=>$data]);
    }
}
