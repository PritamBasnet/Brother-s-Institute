<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    // let us make the function for the detail page
    public function DetailPage($slug)
    {
        $detail = Courses::where('slug',$slug)->first();
        return view('frontend.detail',compact('detail'));
    }
}
