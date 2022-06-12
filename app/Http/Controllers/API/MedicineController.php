<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Helpers\ApiFormatter;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //api call to get all the medicine
        $medicines = Medicine::all();
        return ApiFormatter::format($medicines);
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
        //api call to store the medicine
        try {
            // validate
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'composition' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'image' => 'required',
            ]);
            // bcrypt password
            $medicine = Medicine::create($request->all());
            return ApiFormatter::format($medicine);
        } catch (\Exception $e) {
            return ApiFormatter::format(null, 500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show the medicine
        $medicine = Medicine::find($id);
        return ApiFormatter::format($medicine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update the medicine
        try {
            $medicine = Medicine::find($id);
            $medicine->update($request->all());
            return ApiFormatter::format($medicine);
        } catch (\Exception $e) {
            return ApiFormatter::format(null, 500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destroy data
        try {
            $medicine = Medicine::find($id);
            $medicine->delete();
            return ApiFormatter::format($medicine);
        } catch (\Exception $e) {
            return ApiFormatter::format(null, 500, $e->getMessage());
        }
    }
}
