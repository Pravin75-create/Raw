<?php

namespace App\Http\Controllers;

use App\Models\ReqMaintenance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReqMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id == 1) {
            return view('request.index')->with('reqMantinance', ReqMaintenance::all());
        } else {
            $data = DB::table('users')->join('req_maintenances', 'req_maintenances.user_id', 'users.id')->where('req_maintenances.user_id', auth()->user()->id)->get();
            return view('request.index')->with('reqMantinance', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'description' => 'required',
            'image' => 'required',
            'location' => 'required',
            'user_id' => 'required'
        ]);
        $file = $request->image->store('image');

        ReqMaintenance::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'image' => $file,
            'location' => $request->location,
            'status' => $request->status,
            'user_id' => $request->user_id

        ]);
        return redirect(route('requestMan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReqMaintenance  $reqMaintenance
     * @return \Illuminate\Http\Response
     */
    public function show(ReqMaintenance $reqMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReqMaintenance  $reqMaintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(ReqMaintenance $reqMaintenance)
    {
    //   return view('request.create')->with('reqMantinance',$reqMaintenance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReqMaintenance  $reqMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReqMaintenance $reqMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReqMaintenance  $reqMaintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReqMaintenance $reqMaintenance)
    {
        //
    }
}
