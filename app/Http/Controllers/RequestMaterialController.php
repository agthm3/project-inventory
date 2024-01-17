<?php

namespace App\Http\Controllers;

use App\Models\RequestMaterial;
use Illuminate\Http\Request;

class RequestMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.requestmaterial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestMaterial $requestMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestMaterial $requestMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestMaterial $requestMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestMaterial $requestMaterial)
    {
        //
    }
}
