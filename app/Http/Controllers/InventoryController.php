<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $query = InputData::query();

    //     if ($request->filled('search_term')) {
    //         $searchTerm = $request->input('search_term');
    //         $query->where('name', 'LIKE', "%{$searchTerm}%")
    //                 ->orWhere('ponumber', 'LIKE', "%{$searchTerm}%")
    //                 ->orWhere('supplier', 'LIKE', "%{$searchTerm}%");;
    //         // Tambahkan kondisi pencarian lainnya jika diperlukan
    //     }

    //     $allInventory = $query->get();
    //     return view('dashboard.inventory.index', compact('allInventory'));
    // }

 public function index(Request $request)
    {
        $query = InputData::query();

        // Logika filter berdasarkan search_term
        if ($request->filled('search_term')) {
            $searchTerm = $request->input('search_term');
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ponumber', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('supplier', 'LIKE', "%{$searchTerm}%");
        }

        // Logika filter berdasarkan PO Number
        if ($request->filled('filter_ponumber')) {
            $query->where('ponumber', $request->input('filter_ponumber'));
        }

        // Logika filter berdasarkan Request Date
        if ($request->filled('filter_request_date')) {
            $query->whereDate('verificationdate', $request->input('filter_request_date'));
        }

        // Logika filter berdasarkan Name
        if ($request->filled('filter_name')) {
            $query->where('name', 'LIKE', "%{$request->filter_name}%");
        }
        // Filter Received By
        if ($request->filled('filter_receivedby')) {
            $query->where('receivedby', '=', $request->input('filter_receivedby'));
        }

        // Filter Storage Location
        if ($request->filled('filter_storagelocation')) {
            $query->where('storagelocation', '=', $request->input('filter_storagelocation'));
        }
        // Filter Storage Location
        if ($request->filled('uniqueVehiclenumber')) {
            $query->where('vehiclenumber', '=', $request->input('uniqueVehiclenumber'));
        }
        // Filter Supplier
        if ($request->filled('uniqueSupplier')) {
            $query->where('supplier', '=', $request->input('uniqueSupplier'));
        }
        // Filter Remark
        if ($request->filled('uniqueRemark')) {
            $query->where('remark', '=', $request->input('uniqueRemark'));
        }

        $allInventory = $query->get();

        // Mengambil data unik untuk dropdown
        $uniquePoNumbers = InputData::select('ponumber')->distinct()->pluck('ponumber')->sort();
        $uniqueRequestDates = InputData::select('verificationdate')->distinct()->pluck('verificationdate');
        $uniqueNames = InputData::select('name')->distinct()->pluck('name');
        $uniqueReceivedby = InputData::select('receivedby')->distinct()->pluck('receivedby');
        $uniqueStoragelocation = InputData::select('storagelocation')->distinct()->pluck('storagelocation');
        $uniqueVehiclenumber = InputData::select('vehiclenumber')->distinct()->pluck('vehiclenumber');
        $uniqueSupplier = InputData::select('supplier')->distinct()->pluck('supplier');
        $uniqueRemark = InputData::select('remark')->distinct()->pluck('remark');

        return view('dashboard.inventory.index', compact('allInventory', 'uniquePoNumbers', 'uniqueRequestDates', 'uniqueNames', 'uniqueReceivedby', 'uniqueStoragelocation', 'uniqueVehiclenumber' ,'uniqueSupplier',
    'uniqueRemark'));
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
    public function show( inputData $inputData)
    {
        // $inputData = InputData::where('name', $productName)->firstOrFail();
        return view('dashboard.inventory.show', compact('inputData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
