<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use Illuminate\Http\Request;
use Facades\App\Helper\IceHelper;


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios= Portofolio::all();
        return view('admin.portofolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = PortofolioCategory::all();
        return view('admin.portofolio.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate Data
        $this->validate($request,[
            'title' => 'required|alpha|unique:portofolios|max:255|min:5',
            'link' => 'url'

        ]);
        //Store Data
        $portfolio = new Portofolio();
        $portfolio->title = $request['title'];
        $portfolio->link = $request['link'];
        $portfolio->desc = $request['description'];
        $portfolio->category_id = $request['cat_id'];
        if($request->file('photo')){
            $portfolio->photo = IceHelper::uploadImage($request->file('photo'),'portfolio/');
        }
        $portfolio->save();
        return redirect('/admin/portfolio')->withFlashMessage('Portfolio Added !!');
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
        $portfolio = Portofolio::find($id);
        $category = PortofolioCategory::all();
        return view('admin.portofolio.edit',compact('portfolio','category'));
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
        $portfolio = Portofolio::find($id);


        if($portfolio->title == $request['title']){
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|max:255|min:5',
                'link' => 'url'

            ]);
            $portfolio->title = $request['title'];
            $portfolio->link = $request['link'];
            $portfolio->desc = $request['description'];
            $portfolio->category_id = $request['cat_id'];
            if($request->file('photo')){
                unLink(base_path().'/public/uploads/portfolio/'.$portfolio->photo);
                $portfolio->photo = IceHelper::uploadImage($request->file('photo'),'portfolio/');
            }
            $portfolio->save();
            return redirect('/admin/portfolio')->withFlashMessage('Portfolio Edited !!');

        }else{
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|unique:portofolios|max:255|min:5',
                'link' => 'url'

            ]);
            $portfolio->title = $request['title'];
            $portfolio->link = $request['link'];
            $portfolio->desc = $request['description'];
            $portfolio->category_id = $request['cat_id'];
            if($request->file('photo')){
                unLink(base_path().'/public/uploads/portfolio/'.$portfolio->photo);
                $portfolio->photo = IceHelper::uploadImage($request->file('photo'),'portfolio/');
            }
            $portfolio->save();
            return redirect('/admin/portfolio')->withFlashMessage('Portfolio Edited !!');
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
        $portfolio = Portofolio::find($id);
        if($portfolio->photo){
            unLink(base_path().'/public/uploads/portfolio/'.$portfolio->photo);
        }
        $portfolio->delete();
        return redirect()->back()->withFlashMessage('Portfolio Deleted !!');

    }
}
