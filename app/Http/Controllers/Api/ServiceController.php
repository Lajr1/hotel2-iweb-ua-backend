<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    use ResponseHelper;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return $services;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("store", Service::class);
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'required'
        ]);
        Service::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);

        if ($service != null) {
            return $this->makeSuccessResponse($service, 200);
        } else {
            return $this->makeErrorResponse("Service not found", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize("update", Service::class);
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'required'
        ]);
        $service = Service::find($id);

        if ($service != null) {
            $service->update($request->all());
            return $this->makeSuccessResponse($service, 200);
        } else {
            return $this->makeErrorResponse("Service not found", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize("destroy", Service::class);
        $service = Service::find($id);

        if ($service != null) {
            $service->delete();
            return $this->makeSuccessResponse($service, 200);
        } else {
            return $this->makeErrorResponse("Service not found", 404);
        }
    }
}
