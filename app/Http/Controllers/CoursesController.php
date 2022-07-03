<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Courses::all();
        return view('backend.pages.course.read',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.course.create');
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
            'title'=>'required|max:50|min:5',
            'image'=>'required',
            'slug'=>'required|same:title',
            'short_description'=>'required|max:60|min:20',
            'price'=>'required',
            'editordata'=>'required'

        ]);
        $course = new Courses();
        $course->title = $request['title'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $course->image = $filename;
        }
        $course->slug = Str::slug($request['slug'],'-');
        $course->short_description = $request['short_description'];
        $course->price = $request['price'];
        $course->editordata = $request['editordata'];
        $course->save();
        return redirect()->back()->with('Success','Courses Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $courses,$id)
    {
        $course = Courses::find($id);
        return view('backend.pages.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $courses,$id)
    {
        $course = Courses::find($id);
        $request->validate([
            'title'=>'required|max:50|min:5',
            'image'=>'required',
            'slug'=>'required|same:title',
            'short_description'=>'required|max:60|min:20',
            'price'=>'required',
            'editordata'=>'required'

        ]);
        $course->title = $request['title'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/',$filename);
            $course->image = $filename;
        }
        $course->slug = Str::slug($request['slug'],'-');
        $course->short_description = $request['short_description'];
        $course->price = $request['price'];
        $course->editordata = $request['editordata'];
        $course->update();
        return redirect()->back()->with('update','Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses,$id)
    {
        $course = Courses::find($id);
        $course->delete();
        return redirect()->back()->with('delete','Courses Deleted Successfully!');
    }
}
