<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $contract_number)
    {
        $total = DB::table('list_services')
            ->selectRaw('sum(contract_price) as total')
            ->where('contract_number', $contract_number)
            ->first();

        return view('contract', [
            'contract' => Contract::all()->where('contract_number', $contract_number)->first(),
            'total' => $total
        ]);
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
