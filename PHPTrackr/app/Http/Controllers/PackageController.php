<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function panelIndex()
    {
        $packages = Package::orderBy('id', 'desc')->limit(3)->get();
        $labels = Label::orderBy('id', 'desc')->limit(3)->get();
        return view('adminviews/adminPanel', ['packages' => $packages, 'labels' => $labels]);
    }
    public function index()
    {
        $packages = Package::all();;
        return view('packages.index', ['packages' => $packages]);
    }

    public function show($id)
    {
        $package = Package::find($id);
        return view('labels.create', $package);
    }
    public function create(){
        return view('packages.create');
    }
    public function store(Request $request)
    {
        $webshop = $request->input('webshopName');
        if ($webshop == null){
            $webshop = "Dierenwinkel";
        }
        Package::create(['firstname' => $request->input('firstname'), 'surname' => $request->input('surname'),'email' => $request->input('email'), 'shop' => $webshop]);
        return redirect()->route('adminPanel');
    }
}
