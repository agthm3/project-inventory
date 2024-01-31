<?php

namespace App\Http\Controllers;

use App\Models\ManagementRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ManagementRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllUser = User::all();
        return view('dashboard.management.index', compact('AllUser'));
    }

    public function action(Request $request){
        $userId = $request->input('userId');
        $action = $request->input('action');
        $user = User::findOrFail($userId);

        if ($action == 'delete') {
            $user->delete();
            Session::flash('success', 'Pengguna berhasil dihapus.');
        } elseif ($action == 'makeAdmin') {
            $user->role = 'admin';
            $user->save();
             Session::flash('success', 'Role pengguna berhasil diubah menjadi admin.');
        }

        return Redirect::back();
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
    public function show(ManagementRole $managementRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManagementRole $managementRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManagementRole $managementRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManagementRole $managementRole)
    {
        //
    }
}
