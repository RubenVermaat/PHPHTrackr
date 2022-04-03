<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminpanelController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $labels = Label::all();
        return view('adminviews/adminPanel', ['packages' => $packages, 'labels' => $labels]);
    }
}
