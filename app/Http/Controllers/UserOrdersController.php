<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserOrders;

class UserOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user_order = \App\UserOrder::findOrFail($request->input('user_order', 2));
        return view('userOrders.list', [
            'user_order' => $user_order,
        ]);        
    }
}
