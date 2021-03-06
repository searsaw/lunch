<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;

class RestaurantsController extends Controller
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
    public function index(Request $request, $orgId)
    {
        $organization = \App\Organization::findOrFail($orgId);
        $restaurants = Restaurant::orderBy('name')->get();
        foreach($restaurants as $restaurant) {
            $restaurant->is_used = false;
            if(count($organization->restaurants) > 0) {
                foreach($organization->restaurants as $orgRest) {
                    if($orgRest->id == $restaurant->id) {
                        $restaurant->is_used = true;
                    }
                }
            }
        }
        return view('restaurants.list', [
            'restaurants' => $restaurants,
            'organization' => $organization,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, $orgId)
    {
        return view('restaurants.form', [
            'restaurant' => new \App\Restaurant(),
            'organization_id' => $orgId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $orgId)
    {
        $restaurant = new \App\Restaurant();
        $restaurant->fill($request->input('Restaurant',[]));
        if($restaurant->isValid()) {
            $restaurant->save();
            return redirect()->route('restaurant.index',['orgId'=>$orgId]);
        } else {
            return redirect()->route('restaurant.create')
                ->withErrors($restaurant->getErrors())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
