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
    public function index(Request $request)
    {
        $query = InputData::query();

        if ($request->filled('search_term')) {
            $searchTerm = $request->input('search_term');
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('ponumber', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('supplier', 'LIKE', "%{$searchTerm}%");;
            // Tambahkan kondisi pencarian lainnya jika diperlukan
        }

        $allInventory = $query->get();
        return view('dashboard.inventory.index', compact('allInventory'));
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
