<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }

    public function createTenant(Request $request)
    {
        $request->validate([
            'companyName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // Create Tenant Database
        $tenant = Tenant::create(['id' => $request->companyName]);


        // Create Tenant Domain
        $tenant->domains()->create([
            'domain' => $request->companyName . '.' .env('APP_DOMAIN'),
        ]);
        $tenant->run(function() use ($request){
            // Create User
            User::create([
                'name' => $request->companyName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        });
        return response()->json([
            'message' => 'Tenant created successfully',
            'tenant' => $tenant,
        ]);
    }
}
