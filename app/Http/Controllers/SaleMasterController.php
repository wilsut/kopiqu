<?php

namespace App\Http\Controllers;

use App\SaleMaster;
use Illuminate\Http\Request;

class SaleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SaleMaster::with(['saleDetails'])->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saleMaster = SaleMaster::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'status' => $request->status,
            'shipping' => $request->shipping,
            'random_number' => $request->random_number
        ]);

        return response()->json([
            'status' => (bool) $saleMaster,
            'data'   => $saleMaster,
            'message' => $saleMaster ? 'Order Created!' : 'Error Creating Order'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(SaleMaster $saleMaster)
    {
        return response()->json($saleMaster, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleMaster $saleMaster)
    {
        $status = $saleMaster->update(
            $request->only(['status'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Updated!' : 'Error Updating Order'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleMaster $saleMaster)
    {
        $status = $saleMaster->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Deleted!' : 'Error Deleting Order'
        ]);
    }
}
