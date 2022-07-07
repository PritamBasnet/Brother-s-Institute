<?php

namespace App\Http\Controllers;

use App\Models\increment;
use Illuminate\Http\Request;

class IncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $increment = increment::all();
        return view('backend.pages.increment.read',compact('increment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.increment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sec_1'=>'required',
            'sec_2'=>'required',
            'sec_3'=>'required',
            'sec_4'=>'required',
            'num_1'=>'required',
            'num_2'=>'required',
            'num_3'=>'required',
            'num_4'=>'required',
        ]);
        $increment = new increment();
        $increment->sec_1 = $request['sec_1'];
        $increment->sec_2 = $request['sec_2'];
        $increment->sec_3 = $request['sec_3'];
        $increment->sec_4 = $request['sec_4'];
        $increment->num_1 = $request['num_1'];
        $increment->num_2 = $request['num_2'];
        $increment->num_3 = $request['num_3'];
        $increment->num_4 = $request['num_4'];
        $increment->save();
        return redirect()->back()->with('Success','Increment Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function show(increment $increment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function edit(increment $increment,$id)
    {
        $data = increment::findorfail($id);
        return view('backend.pages.increment.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, increment $increment,$id)
    {
        $increment = increment::findorfail($id);
        $request->validate([
            'sec_1'=>'required',
            'sec_2'=>'required',
            'sec_3'=>'required',
            'sec_4'=>'required',
            'num_1'=>'required',
            'num_2'=>'required',
            'num_3'=>'required',
            'num_4'=>'required',
        ]);
        $increment->sec_1 = $request['sec_1'];
        $increment->sec_2 = $request['sec_2'];
        $increment->sec_3 = $request['sec_3'];
        $increment->sec_4 = $request['sec_4'];
        $increment->num_1 = $request['num_1'];
        $increment->num_2 = $request['num_2'];
        $increment->num_3 = $request['num_3'];
        $increment->num_4 = $request['num_4'];
        $increment->update();
        return redirect('/brothers/admin/increment/index')->with('update','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\increment  $increment
     * @return \Illuminate\Http\Response
     */
    public function destroy(increment $increment,$id)
    {
        $increment = increment::findorfail($id);
        if($increment == null){
            return redirect()->back()->with('update','Opps We are unable to delete');
        }
        else{
            $increment->delete();
            return redirect()->back()->with('delete','Increment Deleted Successfully');
        }
    }
}
