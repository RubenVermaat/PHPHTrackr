<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Package;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return view('/labels.index', ['labels' => $labels]);
    }
    public function show($id)
    {
        $label = Label::find($id);
        //return view('labels.create', $label);
    }

    public function store($id)
    {
        $package = Package::Find($id);
        $package->labelGenerated = true;
        $package->save();
        Label::create(['packageId' => $package->id, 'shop' => 'Dierenwinkel']);
        return redirect()->route('adminPanel');
    }
}
