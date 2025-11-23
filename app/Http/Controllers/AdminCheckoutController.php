<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCheckoutController extends Controller
{
    public function index()
    {
        return view('admin.checkout.index');
    }
}
