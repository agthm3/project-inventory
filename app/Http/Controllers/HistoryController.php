<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\RequestMaterial;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allRequestHistory = RequestMaterial::where('status','success')->orWhere('status','failed')->orWhere('status','pending')->get();
        return view('dashboard.history.index', compact('allRequestHistory'));
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
    public function show(RequestMaterial $requestmaterial)
    {
       return view('dashboard.history.show', compact('requestmaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
