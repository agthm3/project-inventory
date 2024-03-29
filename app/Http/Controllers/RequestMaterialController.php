<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use App\Models\RequestMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RequestMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inputDataNames = InputData::select('name')->distinct()->get();


        return view('dashboard.requestMaterial.index', compact('inputDataNames'));
    }
    // Di dalam RequestMaterialController

public function getDetailsByName($name)
{
    $data = InputData::where('name', $name)->get(['ponumber', 'quantity', 'user']);
    return response()->json($data);
}


public function getAllNamesWithPoNumbers()
{
    $items = InputData::all()->map(function ($item) {
        return [
            'label' => $item->name . ' (' . $item->ponumber . ')',
            'ponumber' => $item->ponumber,
            'quantity' => $item->quantity,
            'user' => $item->user
        ];
    });
    return response()->json($items);
}



public function getDetailsByPONumber($ponumber)
{
    $data = InputData::where('ponumber', $ponumber)->get(['name', 'quantity', 'user']);
    return response()->json($data);
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
            'requestdate' =>'date|required',
            'requestor'=> 'required',
            'department' => 'required|max:255',
            'ponumber' => 'required',
            'notes'=> 'required',
            'from_note'=> 'required',
            'to_note'=> 'required',
            'vehiclenumber'=> 'required',
            'quantity' => 'required',
            'image'=> 'nullable'
        ]);

        
       

        RequestMaterial::create([
            'name' => $request->name,
            'requestdate'=> $request->requestdate, 
            'requestor' => $request->requestor,
            'department' => $request->department,
            'ponumber' => $request->ponumber,
            'notes'=>$request->notes,
            'from_note'=>$request->from_note,
            'to_note'=>$request->to_note,
            'quantity' => $request->quantity,
            'vehiclenumber'=> $request->vehiclenumber,
            'image' => null,
            'user' => $request->user
        ]);
        Session::flash('success', 'Data berhasil dimasukkan.');
        return Redirect::back();
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


    // public function search(Request $request){
    //     $searchTerm = $request->input('search_name');
    //     $names = InputData::where('name', 'LIKE', "%{$searchTerm}%")->get();

    //     return view('dashboard.requestMaterial.index', compact('names'));
    // }
}
