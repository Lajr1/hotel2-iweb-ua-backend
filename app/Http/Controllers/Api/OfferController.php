<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    use ResponseHelper;
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
        $this->authorize("store", Offer::class);
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

        if ($offer != null) {
            return $this->makeSuccessResponse($offer, 200);
        } else {
            return $this->makeErrorResponse("Offer not found", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize("update", Offer::class);
        $request->validate([
            'name' => 'required|max:100',
            'discount' => 'required',
        ]);
        $offer = Offer::find($id);

        if ($offer != null) {
            $offer->update($request->all());
            return $this->makeSuccessResponse($offer, 200);
        } else {
            return $this->makeErrorResponse("Offer not found", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize("destroy", Offer::class);
        $offer = Offer::find($id);

        if ($offer != null) {
            $offer->delete();
            return $this->makeSuccessResponse($offer, 200);
        } else {
            return $this->makeErrorResponse("Offer not found", 404);
        }
    }
}
