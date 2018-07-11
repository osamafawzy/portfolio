<?php

namespace App\Http\Controllers;

use App\Models\PortofolioCategory;
use Illuminate\Http\Request;

class PortofolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get All Category From DB
        $category = PortofolioCategory::all();
        return view('admin.portofolio-category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.portofolio-category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate Data
        $this->validate($request,[
           'title' => 'required|alpha|unique:portofolio_categories|max:255|min:5'
        ]);
        //Store Data
        $cat = new PortofolioCategory();
        $cat->title = $request['title'];
        $cat->save();

        return redirect('/admin/portfolio-category')->withFlashMessage('Category Added');
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
        $category = PortofolioCategory::find($id);
        return view('admin.portofolio-category.edit', compact('category'));
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

        $cat = PortofolioCategory::find($id);

        if($cat->title == $request['title']){
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|max:255|min:5'
            ]);
            $cat->title = $request['title'];
            $cat->save();
            return redirect('/admin/portfolio-category');

        }else{
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|unique:portofolio_categories|max:255|min:5'
            ]);
            $cat->title = $request['title'];
            $cat->save();
            return redirect('/admin/portfolio-category')->withFlashMessage('Category Edited !!');

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
        //
        $cat = PortofolioCategory::find($id);
        $cat->delete();
        return redirect()->back()->withFlashMessage('Category Deleted !!');

    }
}
