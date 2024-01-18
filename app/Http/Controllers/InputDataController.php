<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.inputdata.index');
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
        // dd($request);
    $request->validate([
        'name'=>'required|max:255',
        'verificationdate' =>'date|required',
        'ponumber'=> 'required|numeric',
        'deskripsi' => 'required|max:255',
        'quantity' => 'required|max:255',
        'receivedby'=> 'required',
        'user' => 'required|max:255',
        'storagelocation' => 'required|max:255',
        'vehiclenumber' => 'required|max:255',
        'supplier'=> 'required|max:255',
        'remark' => 'required|max:255',
        'image' => 'required',
    ]);
       $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/'. $path, file_get_contents($file));

        InputData::create([
            'name' => $request->name,
            'verificationdate'=> $request->verificationdate,
            'ponumber'=> $request->ponumber,
            'deskripsi' => $request->deskripsi,
            'quantity'=> $request-> quantity,
            'receivedby'=> $request-> receivedby,
            'user'=> $request->user,
            'storagelocation'=> $request->storagelocation,
            'vehiclenumber'=> $request->vehiclenumber,
            'supplier'=> $request-> supplier,
            'remark'=> $request->remark,
            'image'=> $path,
        ]);
        return Redirect::route('inventory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(InputData $inputData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InputData $inputData)
    {
        return view('dashboard.inventory.edit', compact('inputData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputData $inputData)
    {

      $request->validate([
        'name'=>'required|max:255',
        'verificationdate' =>'date|required',
        'ponumber'=> 'required|numeric',
        'deskripsi' => 'required|max:255',
        'quantity' => 'required|max:255',
        'receivedby'=> 'required',
        'user' => 'required|max:255',
        'storagelocation' => 'required|max:255',
        'vehiclenumber' => 'required|max:255',
        'supplier'=> 'required|max:255',
        'remark' => 'required|max:255',
        'image' => 'image|sometimes'
    ]);
       
    if ($request->hasFile('image')) {
        // Hapus file gambar lama dari storage
        if ($inputData->image && Storage::disk('local')->exists('public/' . $inputData->image)) {
            Storage::disk('local')->delete('public/' . $inputData->image);
        }

        // Simpan file gambar baru
        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'. $path, file_get_contents($file));
        $inputData->image = $path; // Perbarui path gambar
    }
        $inputData->update([
            'name' => $request->name,
            'verificationdate'=> $request->verificationdate,
            'ponumber'=> $request->ponumber,
            'deskripsi' => $request->deskripsi,
            'quantity'=> $request-> quantity,
            'receivedby'=> $request-> receivedby,
            'user'=> $request->user,
            'storagelocation'=> $request->storagelocation,
            'vehiclenumber'=> $request->vehiclenumber,
            'supplier'=> $request-> supplier,
            'remark'=> $request->remark,
            'image'=> $inputData->image,
        ]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InputData $inputData)
    {
        //
    }
}
