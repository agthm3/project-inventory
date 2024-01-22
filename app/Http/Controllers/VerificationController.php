<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use App\Models\RequestMaterial;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allVerification = RequestMaterial::where('status', 'pending')->get();
        return view('dashboard.verification.index', compact('allVerification'));
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
    public function store(Request $request, $id)
    {
        $verification = RequestMaterial::findOrFail($id); // Ganti dengan model yang benar

        if ($request->hasFile('image')) {
            // Proses dan simpan file
            $filename = $request->documentation->store('public/documentation');
            $verification->image = $filename;
        }

        // Update status berdasarkan aksi
        $verification->status = $request->input('action') == 'confirm' ? 'success' : 'failed';
        $verification->save();

        return redirect()->back()->with('success', 'Action successfully processed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Verification $verification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Verification $verification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Verification $verification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Verification $verification)
    {
        //
    }
}
