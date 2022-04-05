<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerViewController extends Controller
{
    public function index()
    {
        $data = 0;
    
        if(request('button')){
            $data = Label::join('packages', 'labels.packageId', '=', 'packages.id')
            ->orderBy(request('button'))
            ->select(['labels.id','packages.firstname', 'packages.email', 'packages.shop', 'labels.status'])
            ->paginate(5);
        } else if(request('search')){
           $data = $this->getSearchResult();
        } else{
            $data = Label::join('packages', 'labels.packageId', '=', 'packages.id')
            ->select(['labels.id','packages.firstname', 'packages.email','labels.shop', 'labels.status'])
            ->paginate(5);
        }
        
        return view('customers.index', ['data' => $data]);
    }

    public function getSearchResult(){
        $result = Label::join('packages', 'labels.packageId', '=', 'packages.id')
        ->where('packages.firstname', 'like', '%' . request('search') . '%')
        ->orWhere('packages.email', 'like', '%' . request('search') . '%')
        ->orWhere('labels.shop', 'like', '%' . request('search') . '%')
        ->orWhere('labels.status', 'like', '%' . request('search') . '%')
        ->select(['labels.id','packages.firstname', 'packages.email','labels.shop', 'labels.status'])
        ->paginate(5);
        return $result;
    }
    public function show(){
        
        $data = Review::all();
        return view('customers.review', ['data' => $data]);
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:800'],
            //'rating' => ['integer','min:1','max:5'],
        ]);
        
        Review::create([
            'name' => $request->name,
            'comment' => $request->body,    
            'rating' => 4,   
        ]);
        
    }
}
