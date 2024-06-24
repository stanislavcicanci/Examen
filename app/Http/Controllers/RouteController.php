<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;

class RouteController extends Controller
{

    public function home(){
        $products = Product::paginate(1000);
        return view('home', compact('products'));   
    }
}
