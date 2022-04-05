<?php

namespace App\Http\Controllers;

use App\Imports\packageImport;
use App\Models\Label;
use App\Models\Package;
use App\Imports\UsersImport;
use App\Models\Webshop;
use Maatwebsite\Excel\Facades\Excel;
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
        $packages = Package::sortable()->paginate(10);
        return view('packages.index', ['packages' => $packages]);
    }

    public function search(Request $request)
    {
        $searchInput = $request->input('search');

        if (!empty($searchInput)) {
            $packages = Package::where('firstname', '=', $searchInput)->orWhere('surname', '=', $searchInput)->orWhere('email', '=', $searchInput)->sortable()->paginate(10);
        } else {
            $packages = Package::sortable()->paginate(10);
        }

        return view('packages.index', ['packages' => $packages]);
    }

    public function show($id)
    {
        $package = Package::find($id);
        return view('labels.create', $package);
    }
    public function create(){
        $webshops = Webshop::pluck('name');
        return view('packages.create', ['webshops' => $webshops]);
    }
    public function store(Request $request) // OUTDATED
    {
        $housedelivery = true;
        $webshop = $request->input('webshopName');
        if ($webshop == null){
            $webshop = "Dierenwinkel";
        }
        if (empty($request->input('city')) || empty($request->input('street')) || empty($request->input('housenumber'))) 
         $housedelivery = false;
        Package::create([
            'firstname' => $request->input('firstname'), 
            'surname' => $request->input('surname'),
            'email' => $request->input('email'), 
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'housenumber' => $request->input('housenumber'),
            'homeDelivery' => $housedelivery,
            'shop' => $webshop
        ]);
        return redirect()->route('adminPanel');
    }

    public function import()
    {
        Excel::import(new packageImport, request()->file('file'));

        return back();
    }
}
