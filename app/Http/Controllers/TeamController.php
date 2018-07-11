<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Facades\App\Helper\IceHelper;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::all();
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.team.create');

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
            'name' => 'required|alpha|unique:teams|max:255|min:5',
            'position' => 'alpha',
            'facebook' => 'url',
            'twitter' => 'url',
            'google' => 'url'
        ]);
        //Store Data
        $team = new Team();
        $team->name = $request['name'];
        $team->position = $request['position'];
        $team->facebook = $request['facebook'];
        $team->twitter = $request['twitter'];
        $team->google = $request['google'];
        if($request->file('photo')){
            $team->photo = IceHelper::uploadImage($request->file('photo'),'team/');
        }
        $team->save();
        return redirect('/admin/team')->withFlashMessage('Team Added !!');
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
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
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
        $team = Team::find($id);

        if($team->name == $request['name']){
            //validate Data
            $this->validate($request,[
                'name' => 'required|alpha|max:255|min:5',
                'position' => 'alpha',
                'facebook' => 'url',
                'twitter' => 'url',
                'google' => 'url'
            ]);
            //Store Data
            $team->name = $request['name'];
            $team->position = $request['position'];
            $team->facebook = $request['facebook'];
            $team->twitter = $request['twitter'];
            $team->google = $request['google'];
            if($request->file('photo')){
                unLink(base_path().'/public/uploads/team/'.$team->photo);
                $team->photo = IceHelper::uploadImage($request->file('photo'),'team/');
            }
            $team->save();
            return redirect('/admin/team')->withFlashMessage('Team Edited !!');

        }else{
            //validate Data
            $this->validate($request,[
                'name' => 'required|alpha|unique:teams|max:255|min:5',
                'position' => 'alpha',
                'facebook' => 'url',
                'twitter' => 'url',
                'google' => 'url'
            ]);
            //Store Data
            $team->name = $request['name'];
            $team->position = $request['position'];
            $team->facebook = $request['facebook'];
            $team->twitter = $request['twitter'];
            $team->google = $request['google'];
            if($request->file('photo')){
                unLink(base_path().'/public/uploads/team/'.$team->photo);
                $team->photo = IceHelper::uploadImage($request->file('photo'),'team/');
            }
            $team->save();
            return redirect('/admin/team')->withFlashMessage('Team Edited !!');
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
        $team = Team::find($id);
        if($team->photo){
            unLink(base_path().'/public/uploads/team/'.$team->photo);
        }
        $team->delete();
        return redirect()->back()->withFlashMessage('Team Deleted !!');

    }
}
