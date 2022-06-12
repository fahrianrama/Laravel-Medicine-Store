<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    // index
    public function index()
    {
        // get all medicine
        $medicines = Medicine::all();
        return view('medicine.index', compact('medicines'));
    }
    public function show($id)
    {
        // get medicine by id
        $medicine = Medicine::find($id);
        return view('medicine.detail', compact('medicine'));
    }
    // search
    public function search(Request $request)
    {
        // get medicine by name
        $medicines = Medicine::where('name', 'like', '%'.$request->input('name').'%')->get();
        $keyword = $request->input('name');
        // return view with data and search keyword
        return view('medicine.index', compact('medicines', 'keyword'));
    }
    public function store(Request $request)
    {
        // get image
        $image = $request->file('image');
        // get image name
        $imageName = $image->getClientOriginalName();
        // save image
        $image->move(public_path('images/medicines'), $imageName);
        // set data from all request
        $data = $request->all();
        // set image name to data
        $data['image'] = $imageName;
        // create medicine
        Medicine::create($data);
        // redirect to medicine page
        return redirect('/medicine');
    }
    public function update(Request $request)
    {
        // get medicine by id
        $medicine = Medicine::find($request->input('id'));
        // update
        $medicine->update($request->all());
        // redirect to medicine page
        return redirect('/medicine/show/'.$medicine->id);
    }
    public function delete($id)
    {
        // get medicine by id
        $medicine = Medicine::find($id);
        // delete
        $medicine->delete();
        // redirect to medicine page
        return redirect('/medicine');
    }
}
