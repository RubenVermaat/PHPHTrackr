<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Package;
use App\Models\Webshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LabelController extends Controller
{
    public function index()
    {
        $webshops = DB::table('statuses')->pluck('name');
        $labels = Label::sortable()->paginate(10);
        return view('/labels.index', ['labels' => $labels, 'statuses' => $webshops]);
    }
    
    public function search(Request $request)
    {
        $searchStatus = $request->status;
        $webshops = DB::table('statuses')->pluck('name');

        if ($searchStatus != null){
            $packages = Label::where('status', '=', $searchStatus)->sortable()->paginate(10);
        }else{
            $packages = Label::sortable()->paginate(10);
        }

        return view('labels.index', ['labels' => $packages, 'statuses' => $webshops]);
    }

    public function show($id)
    {
    }

    public function store($id)
    {
        $package = Package::Find($id);
        $package->labelGenerated = true;
        $package->save();
        Label::create(['packageId' => $package->id]);
        return redirect()->route('adminPanel');
    }

    public function exportPDF($id)
    {
        $label = Label::find($id);
        $package = Package::where('id', '=', $label->packageId)->get();
        if (!$package->first()->homeDelivery){
            $shop = Webshop::where('name', '=', $package->first()->shop)->get();
            $deliveryInfo['where'] = $shop->first()->name;
            $deliveryInfo['city'] = $shop->first()->city;
            $deliveryInfo['street'] = $shop->first()->street;
            $deliveryInfo['housenumber'] = $shop->first()->housenumber;
            $deliveryInfo['statement'] = "Will be delivert at the shop";
        }else{
            $deliveryInfo['where'] = $package->first()->firstname. " " .$package->first()->surname;
            $deliveryInfo['city'] = $package->first()->city;
            $deliveryInfo['street'] = $package->first()->street;
            $deliveryInfo['housenumber'] = $package->first()->housenumber;
            $deliveryInfo['statement'] = "Will be delivert at your home";
        }
        
        view()->share('p', $label);
        $pdf_doc = PDF::loadView('labels/pdf', ['label' => $label, 'package' => $package, 'deliveryInfo' => $deliveryInfo]);

        return $pdf_doc->download('pdf.pdf');
        //return view('labels.pdf', ['label' => $label, 'package' => $package, 'deliveryInfo' => $deliveryInfo]);// converting to page for editing ease
    }  
}
