<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    //配信画面表示
    public function showDelivery() {
        return view('user.delivery');
    }
}
