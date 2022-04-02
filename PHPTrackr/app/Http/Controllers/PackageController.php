<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $data = Package::paginate(6);
        return view('adminPanel', ['data' => $data]);
    }
}
