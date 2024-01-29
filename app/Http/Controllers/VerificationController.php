<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\InputData;
use App\Models\RequestMaterial;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $allVerification = RequestMaterial::with('inputData')->where('status', 'pending')->get();
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
    // public function store(Request $request, $id)
    // {
    //     $verification = RequestMaterial::findOrFail($id); 

    //     if ($request->hasFile('image')) {
    //         // Proses dan simpan file
    //         $filename = $request->documentation->store('public/documentation');
    //         $verification->image = $filename;
    //     }

    //     // Update status berdasarkan aksi
    //     $verification->status = $request->input('action') == 'confirm' ? 'success' : 'failed';
    //     $verification->save();

    //     return redirect()->back()->with('success', 'Action successfully processed.');
    // }

    public function store(Request $request, $id)
{
    $verification = RequestMaterial::findOrFail($id);

    // Menghapus gambar lama jika ada
    if ($verification->image) {
        Storage::delete('public/' . $verification->image);
    }

    // Mengunggah gambar baru
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $verification->image = $path; // Menyimpan nama file gambar baru ke dalam database
    }

    // Jika status konfirmasi
    if ($request->input('action') == 'confirm') {
        // Ambil data dari InputData berdasarkan nama di RequestMaterial
        $inputData = InputData::where('name', $verification->name)->first();

        // Jika inputData tidak ditemukan atau quantity tidak cukup
        if (!$inputData || $inputData->quantity < $verification->quantity) {
            return redirect()->back()->withErrors(['error' => 'Insufficient stock or material not found']);
        }

        // Mengurangi quantity pada InputData
        $inputData->quantity -= $verification->quantity;
        $inputData->save();

        // Membuat entri baru di model History
        // Sesuaikan model History sesuai kebutuhan
        // History::create([
        //     'name' => $request->name,
        //     'requestdate'=> $request->requestdate, 
        //     'requestor' => $request->requestor,
        //     'department' => $request->department,
        //     'ponumber' => $request->ponumber,
        //     'notes'=>$request->notes,
        //     'from_note'=>$request->from_note,
        //     'to_note'=>$request->to_note,
        //     'quantity' => $request->quantity,
        //     'vehiclenumber'=> $request->vehiclenumber,
        //     'image' => $request->image
        // ]);

        $verification->status = 'success';
    } else {
        // Jika status tolak
        $verification->status = 'failed';
    }


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
