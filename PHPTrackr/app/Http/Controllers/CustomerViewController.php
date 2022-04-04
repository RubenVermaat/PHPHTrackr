<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class CustomerViewController extends Controller
{
    public function show()
    {
        $data = Label::paginate(2);
        return view('customers.index',  ['data' => $data]);
    }

    
    public function store(Request $request)
    {
       
    }
}
