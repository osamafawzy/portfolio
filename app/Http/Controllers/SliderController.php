<?php

namespace App\Http\Controllers;

use Facades\App\Helper\IceHelper;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'description' => 'required',
            'photo' => 'required'
        ]);

        $slider = new Slider();

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->photo = IceHelper::uploadImage($request->file('photo'),'slider/');
        $slider->save();
        return redirect('/admin/slider')->withFlashMessage('Slider Added !!');
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
        //
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));

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
        //

        $this->validate($request,[
            'title' => 'required|max:50',
            'description' => 'required'
        ]);

        $slider = Slider::find($id);

        $slider->title       = $request['title'];
        $slider->description = $request['description'];

        if($file = $request->file('photo')){
            unLink(base_path().'/public/uploads/slider/'.$slider->photo);
            $slider->photo = IceHelper::uploadImage($request->file('photo'),'slider/');
        }else{
            $slider->photo = $slider->photo;
        }
        $slider->save();

        return redirect('/admin/slider')->withFlashMessage('Slider Edited !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $slider = Slider::find($id);
        unLink(base_path().'/public/uploads/slider/'.$slider->photo);
        $slider->delete();
        return redirect()->back()->withFlashMessage('Slider Deleted !!');

    }
}
