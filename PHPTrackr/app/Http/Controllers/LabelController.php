<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Package;
use App\Models\Webshop;
use Illuminate\Http\Request;
use PDF;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::sortable()->paginate(10);
        return view('/labels.index', ['labels' => $labels]);
    }
    
    public function search(Request $request)
    {
        $searchInput = $request->input('search');
        $searchStatus = $request->status;

        if (!empty($searchInput) && $searchStatus != "----") {
            $packages = Label::where('shop', '=', $searchInput)->where('status', '=', $searchStatus)->sortable()->paginate(10);
        } else if (!empty($searchInput)) {
            $packages = Label::where('shop', '=', $searchInput)->sortable()->paginate(10);
        } else if ($searchStatus != "----"){
            $packages = Label::where('status', '=', $searchStatus)->sortable()->paginate(10);
        }else{
            $packages = Label::sortable()->paginate(10);
        }

        return view('labels.index', ['labels' => $packages]);
    }

    public function show($id)
    {
    }

    public function store($id)
    {
        $package = Package::Find($id);
        $package->labelGenerated = true;
        $package->save();
        Label::create(['packageId' => $package->id, 'shop' => 'Dierenwinkel']);
        return redirect()->route('adminPanel');
    }

    public function exportPDF($id)
    {
        $label = Label::find($id);
        $package = Package::where('id', '=', $label->packageId)->get();
        if (!$package->first()->homeDelivery){
            $shop = Webshop::where('name', '=', $package->first()->shop)->get();
            $deliveryInfo['city'] = $shop->first()->city;
            $deliveryInfo['street'] = $shop->first()->street;
            $deliveryInfo['housenumber'] = $shop->first()->housenumber;
            $deliveryInfo['statement'] = "Will be delivert at the shop";
        }else{
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
