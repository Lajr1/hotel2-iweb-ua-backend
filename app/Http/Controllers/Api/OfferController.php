<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return $offers;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|max:100',
          'discount' => 'required',
        ]);
        Offer::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::find($id);
        return $offer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
          'name' => 'required|max:100',
          'discount' => 'required',
        ]);
        $offer = Offer::find($id);
        $offer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = Offer::find($id);
        $offer->delete();
    }
}
