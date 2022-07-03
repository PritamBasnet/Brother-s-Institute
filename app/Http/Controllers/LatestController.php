<?php

namespace App\Http\Controllers;

use App\Models\Latest;
use Illuminate\Http\Request;

class LatestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Latest::all();
        return view('backend.pages.latest.read',compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.latest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notice = new Latest();
        $notice->notice = $request['notice'];
        $notice->save();
        return redirect()->back()->with('Success','Notice Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Latest  $latest
     * @return \Illuminate\Http\Response
     */
    public function show(Latest $latest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Latest  $latest
     * @return \Illuminate\Http\Response
     */
    public function edit(Latest $latest,$id)
    {
        $notice = Latest::findorfail($id);
        if($notice == null){
            return redirect()->back()->with('delete','Opps try again');
        }
        else
        {
            return view('backend.pages.latest.edit',compact('notice'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Latest  $latest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latest $latest,$id)
    {
        $notice = Latest::findorfail($id);
        $notice->notice = $request['notice'];
        $notice->update();
        return redirect('/brothers/admin/latest/index')->with('Success','Notice have been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Latest  $latest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latest $latest,$id)
    {
        $notice = Latest::findorfail($id);
        if($notice == null){
            return redirect()->back()->with('delete','Opps Something went wrong');
        }
        else
        {
            $notice->delete();
            return redirect()->back()->with('delete','Notice Deleted');
        }
    }
}
