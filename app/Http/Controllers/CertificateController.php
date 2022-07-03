<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificate = Certificate::all();
        return view('backend.pages.certificate.read',compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.certificate.create');
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
            'name'=>'required',
            'certificate_no'=>'required|numeric',
            'image'=>'required',
            'birth'=>'required',
            'description'=>'required'
        ]);
        $certificate = new Certificate();
        $certificate->name = $request['name'];
        $certificate->certificate_no = $request['certificate_no'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $certificate->image = $filename;
        }
        $certificate->birth =  $request['birth'];
        $certificate->description = $request['description'];
        $certificate->save();
        return redirect()->back()->with('Success','Certificate Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate,$id)
    {
        $certificate = Certificate::findorfail($id);
        return view('backend.pages.certificate.edit',compact('certificate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate,$id)
    {
        $certificate = Certificate::findorfail($id);
        $request->validate([
            'name'=>'required',
            'certificate_no'=>'required|numeric',
            'image'=>'required',
            'birth'=>'required',
            'description'=>'required'
        ]);
        $certificate->name = $request['name'];
        $certificate->certificate_no = $request['certificate_no'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $certificate->image = $filename;
        }
        $certificate->birth =  $request['birth'];
        $certificate->description = $request['description'];
        $certificate->update();
        return redirect()->back()->with('update','Certificate Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate,$id)
    {
        $certificate = Certificate::find($id);
        if($certificate == null)
        {
            return redirect()->back()->with('delete','Oops We didnt found!!');
        }
        else
        {
            $certificate->delete();
            return redirect()->back()->with('delete','Certificate Deleted Successfully');
        }
    }
    public function filter(Request $req)
    {
        $data = $req['search'];
        $search = Certificate::where('certificate_no','=',$data)->get();
        return view('frontend.certificate',compact('search'));
    }
}
