<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function showTop(){
        
        $admins = Admin::select('name', 'email')->get();
        return view('admin.top', ['admins' => $admins]);
    }

}
