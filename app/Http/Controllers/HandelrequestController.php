<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Handelrequest;
use App\Models\ReqMaintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandelrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data= DB::table('users')->join('req_maintenances','req_maintenances.user_id','users.id')->where('req_maintenances.user_id')->get();
        return view('handlerequest.index')->with('handlereq', ReqMaintenance::all())->with('handlereq1', User::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Handelrequest  $handelrequest
     * @return \Illuminate\Http\Response
     */
    public function show(Handelrequest $handelrequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Handelrequest  $handelrequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Handelrequest $handelrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Handelrequest  $handelrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handelrequest $handelrequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handelrequest  $handelrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handelrequest $handelrequest)
    {
    }
    public function updatefirst(ReqMaintenance $id, Request $request)
    {
        // dd('Hello');
        $id->subject = $request->subject;
        $id->description = $request->description;
        $id->image = $request->image;
        $id->location = $request->location;
        $id->status = $request->status;
        $id->save();
        $request->session()->flash('message', 'Pending Message is send Successfully');
        return redirect(route('HandleRequest.index'));
    }
    public function updatesecond(ReqMaintenance $id, Request $request)
    {
        // dd('Hello');
        $id->subject = $request->subject;
        $id->description = $request->description;
        $id->image = $request->image;
        $id->location = $request->location;
        $id->status = $request->status;
        $id->save();
        $request->session()->flash('message', 'Processing Message is send Successfully');
        return redirect(route('HandleRequest.index'));
    }
    public function updatethird(ReqMaintenance $id, Request $request)
    {
        // dd('Hello');
        $id->subject = $request->subject;
        $id->description = $request->description;
        $id->image = $request->image;
        $id->location = $request->location;
        $id->status = $request->status;
        $id->save();
        $request->session()->flash('message', 'Completed Message is send Successfully');
        return redirect(route('HandleRequest.index'));
    }
    public function remarks(ReqMaintenance $id, Request $request)
    {

        $id->subject = $request->subject;
        $id->description = $request->description;
        $id->image = $request->image;
        $id->location = $request->location;
        $id->status = $request->status;
        $id->remarks = $request->remarks;
        $id->save();
        $request->session()->flash('message', 'Remarks is send Successfully');
        return redirect(route('HandleRequest.index'));
    }
    public function view(ReqMaintenance $id)
    {
        return view('HandleRequest.show')->with('show',$id);
    }
}
