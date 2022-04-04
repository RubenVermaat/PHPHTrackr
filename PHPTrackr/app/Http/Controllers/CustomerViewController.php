<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerViewController extends Controller
{
    public function index()
    {
        $data = 0;
    
        if(request('name')){
            $data = DB::table('labels')->join('packages', 'labels.packageId', '=', 'packages.id')
            ->orderBy(request('name'))
            ->select(['labels.id','packages.firstname', 'packages.email','labels.shop', 'labels.status'])
            ->paginate(2);
        } else if(request('search')){
           
            $data = DB::table('labels')->join('packages', 'labels.packageId', '=', 'packages.id')
            ->where('packages.firstname', 'like', '%' . request('search') . '%')
            ->orWhere('packages.email', 'like', '%' . request('search') . '%')
            ->orWhere('labels.shop', 'like', '%' . request('search') . '%')
            ->orWhere('labels.status', 'like', '%' . request('search') . '%')
            ->select(['labels.id','packages.firstname', 'packages.email','labels.shop', 'labels.status'])
            ->paginate(2);
        } else{
            $data = DB::table('labels')->join('packages', 'labels.packageId', '=', 'packages.id')
            ->select(['labels.id','packages.firstname', 'packages.email','labels.shop', 'labels.status'])
            ->paginate(2);
        }
        
        return view('customers.index',  ['data' => $data]);
    }

    
}
