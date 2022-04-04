<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerViewController extends Controller
{
    public function show()
    {
        
        return view('customers.index');
    }

    
    public function store(Request $request)
    {
       
    }
}
