<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Facades\App\Helper\IceHelper;

class serviceController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;

        if($request->file('icon')){
            if (IceHelper::checkIconSize($request->file('icon'))){
                $service->icon = IceHelper::uploadImage($request->file('icon'),'service/icon/');

            }else{
                //            failed_message
                return redirect()->back()->withFailedMessage('The icon size is very big please select smaller size');
                //            return redirect()->back()->withFlashMessage('The icon size is very big please select smaller size');
            }
        }

        if (isset($service->photo)) {
            $service->photo = IceHelper::uploadImage($request->file('photo'), 'service/photo/');
        }else{
            $service->photo=null;
        }

        $service->save();

        if (isset($service->photo)) {
            IceHelper::uploadThumb($service->photo);
        }
        $request->session()->flush();
        return redirect('/admin/service')->withFlashMessage('Service Added');
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
         $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
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
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;

        if ($file = $request->file('icon')){
            unLink(base_path().'/public/uploads/service/icon/'.$service->icon);
            if (IceHelper::checkIconSize($request->file('icon'))){
                $service->icon = IceHelper::uploadImage($request->file('icon'),'service/icon/');
            }else{
                return redirect()->back()->withFailedMessage('The icon size is very big please select smaller size');

            }
        }else{
            $service->icon = $service->icon;
        }


        if ($file = $request->file('photo')){
        unLink(base_path().'/public/uploads/service/photo/'.$service->photo);
        unLink(base_path().'/public/uploads/service/photo/thumb/'.$service->photo);
        $service->photo = IceHelper::uploadImage($request->file('photo'),'service/photo/');
    }else{
        $service->photo = $service->photo;
    }

        $service->save();

        IceHelper::uploadThumb($service->photo);

        return redirect('/admin/service')->withFlashMessage('Service Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (isset($service->photo)) {
            unLink(base_path() . '/public/uploads/service/photo/' . $service->photo);
            unLink(base_path() . '/public/uploads/service/photo/thumb/' . $service->photo);
        }
        if (isset($service->icon)) {
            unLink(base_path() . '/public/uploads/service/icon/' . $service->icon);
        }
        $service->delete();
        return redirect()->back()->withFlashMessage('Service Deleted');
    }
}
