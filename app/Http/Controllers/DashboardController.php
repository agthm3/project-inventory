<?php

namespace App\Http\Controllers;

use App\Models\rc;
use App\Models\RequestMaterial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $completeRequest = RequestMaterial::where('status', 'success')->count();
        $pendingRequest = RequestMaterial::where('status', 'pending')->count();
        $failedRequest = RequestMaterial::where('status', 'failed')->count();
        return view('dashboard.home.index', compact('completeRequest','pendingRequest','failedRequest'));
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
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rc $rc)
    {
        //
    }
}
