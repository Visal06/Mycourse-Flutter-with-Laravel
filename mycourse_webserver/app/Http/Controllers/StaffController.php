<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'txtname' => 'required|string|max:255',
            'txtsex' => 'required|string|max:255',
            'txtposition' => 'required|string|max:255',
            'txtphone' => 'required|string|max:255',
            'txtaddress' => 'required|string|max:255',
            'dtpstart' => ['required', 'date'],
        ]);
        $data = new Staff();
        $data->name = $request->txtname;
        $data->sex = $request->txtsex;
        $data->position = $request->txtposition;
        $data->phone = $request->txtphone;
        $data->address = $request->txtaddress;
        $data->start_date = $request->dtpstart;
        $data->save();
        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = new Staff();
        $data = $data->find($id);
        return view('staff.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'txtname' => 'required|string|max:255',
            'txtsex' => 'required|string|max:255',
            'txtposition' => 'required|string|max:255',
            'txtphone' => 'required|string|max:255',
            'txtaddress' => 'required|string|max:255',
            'dtpstart' => ['required', 'date'],
        ]);
        $data = new Staff();
        $data = $data->find($id);


        $data->name = $request->txtname;
        $data->sex = $request->txtsex;
        $data->position = $request->txtposition;
        $data->phone = $request->txtphone;
        $data->address = $request->txtaddress;
        $data->start_date = $request->dtpstart;
        $data->update();
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = new Staff();
        $data = Staff::find($id);
        $data->find($id)->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
