<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Facades\App\Helper\IceHelper;

class testimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->text = $request->text;

        if (isset($testimonial->photo)){
            $testimonial->photo = IceHelper::uploadImage($request->file('photo'),'testimonial/photo/');

        }else{
            $testimonial->photo = null;
        }


        $testimonial->save();
        return redirect('/admin/testimonial')->withFlashMessage('Testimonial Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
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
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->text = $request->text;

        if ($file = $request->file('photo')){
            unLink(base_path().'/public/uploads/testimonial/photo/'.$testimonial->photo);
            $testimonial->photo = IceHelper::uploadImage($request->file('photo'),'testimonial/photo/');
        }else{
            $testimonial->photo = $testimonial->photo;
        }

        $testimonial->save();
        return redirect('/admin/testimonial')->withFlashMessage('Testimonial Edited');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if (isset($testimonial->photo)) {
            unLink(base_path() . '/public/uploads/testimonial/photo/' . $testimonial->photo);
        }
        $testimonial->delete();
        return redirect('/admin/testimonial')->withFlashMessage('Testimonial Deleted');

    }
}
