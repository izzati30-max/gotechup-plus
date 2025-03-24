<?php

namespace App\Http\Controllers;

use App\Models\AwsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = DB::connection('aws')->table('AdminAccount')->count();
        return Inertia::render('Dashboard',[
            'admin_count' => $admin,
        ]);
    }

    public function admin(Request $request)
    {
        $admin = DB::connection('aws')->table('AdminAccount')->get();

        $result = [
            'admin_count' => $admin
        ];

        // Return JSON for API requests, otherwise return Inertia response
        return $request->is('api/*')
            ? response()->json($result)
            : Inertia::render('Dashboard', $result);
    }

    public function account(Request $request)
    {
        $account = DB::connection('aws')->table('Account')->get();

        $result = [
            'account' => $account
        ];

        // Return JSON for API requests, otherwise return Inertia response
        return $request->is('api/*')
            ? response()->json($result)
            : Inertia::render('Dashboard', $result);
    }

    public function app(Request $request)
    {
        $app = DB::connection('aws')->table('AppId')->get();

        $result = [
            'appId' => $app
        ];

        // Return JSON for API requests, otherwise return Inertia response
        return $request->is('api/*')
            ? response()->json($result)
            : Inertia::render('Dashboard', $result);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
