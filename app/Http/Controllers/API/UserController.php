<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return ApiFormatter::format($users);
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
        // try catch
        try {
            // validate
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required|min:6',
                'name' => 'required',
                'gender' => 'required',
                'location' => 'required',
                'role' => 'required',
            ]);
            // bcrypt password
            $request->merge(['password' => bcrypt($request->password)]);
            $user = User::create($request->all());
            return ApiFormatter::format($user);
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
        //show id
        $user = User::find($id);
        return ApiFormatter::format($user);
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
        //update
        try {
            // validate
            $this->validate($request, [
                'password' => 'min:6',
            ]);
            $user = User::find($id);
            $user->update($request->all());
            return ApiFormatter::format($user);
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
        //destroy
        try {
            $user = User::find($id);
            $user->delete();
            return ApiFormatter::format($user);
        } catch (\Exception $e) {
            return ApiFormatter::format(null, 500, $e->getMessage());
        }
    }
}
