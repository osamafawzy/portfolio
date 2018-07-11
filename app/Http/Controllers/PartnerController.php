<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Facades\App\Helper\IceHelper;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partners = Partner::all();
        return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.partner.create');
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
        //
        //validate Data
        $this->validate($request,[
            'title' => 'required|alpha|unique:partners|max:255|min:5',
            'link' => 'url'

        ]);
        //Store Data
        $partner = new Partner();
        $partner->title = $request['title'];
        $partner->link = $request['link'];

        if($request->file('logo')){

            if (IceHelper::checkIconSize($request->file('logo'))){
                $partner->logo = IceHelper::uploadImage($request->file('logo'),'partner/');

            }else{
                return redirect()->back()->withFailedMessage('The Logo size is very big please select smaller size');
            }
        }
        $partner->save();
        return redirect('/admin/partner')->withFlashMessage('Partner Added !!');
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
        $partner =Partner::find($id);

        return view('admin.partner.edit',compact('partner'));

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
        $partner =Partner::find($id);


        if($partner->title == $request['title']){
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|max:255|min:5',
                'link' => 'url'

            ]);
            $partner->title = $request['title'];
            $partner->link = $request['link'];

            if($request->file('logo')){

                if (IceHelper::checkIconSize($request->file('logo'))){
                    unLink(base_path().'/public/uploads/partner/'.$partner->logo);
                    $partner->logo = IceHelper::uploadImage($request->file('logo'),'partner/');

                }else{
                    return redirect()->back()->withFailedMessage('The Logo size is very big please select smaller size');
                }
            }
            $partner->save();
            return redirect('/admin/partner')->withFlashMessage('Partner Edited !!');

        }else{
            //validate Data
            $this->validate($request,[
                'title' => 'required|alpha|unique:partners|max:255|min:5',
                'link' => 'url'

            ]);
            $partner->title = $request['title'];
            $partner->link = $request['link'];

            if($request->file('logo')){

                if (IceHelper::checkIconSize($request->file('logo'))){
                    unLink(base_path().'/public/uploads/partner/'.$partner->logo);
                    $partner->logo = IceHelper::uploadImage($request->file('logo'),'partner/');

                }else{
                    return redirect()->back()->withFailedMessage('The Logo size is very big please select smaller size');
                }
            }
            $partner->save();
            return redirect('/admin/partner')->withFlashMessage('Partner Edited !!');
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
        //
        $partner = Partner::find($id);
        if($partner->logo){
            unLink(base_path().'/public/uploads/partner/'.$partner->logo);
        }
        $partner->delete();
        return redirect()->back()->withFlashMessage('Partner Deleted !!');

    }
}
