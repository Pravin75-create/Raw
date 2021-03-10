<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\User;
use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Request\devices\UpdateDeviceRequest;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\DevicesExport;;


class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('devices.index')->with('devices', Devices::all());
    }
    public function export(Request $request)
    {

       $request->session()->flash('message','Excel File Downloaded Successfully');
        return Excel::download(new DevicesExport, 'devices.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Devices $devices)
    {
        return view('devices.create');
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
            'name' => 'required',
            'date' => 'required',
            'return_date' => 'required',
            // 'user_id'=>'required'
        ]);
        Devices::create([
            'name' => $request->name,
            'date' => $request->date,
            'return_date' => $request->return_date,
            // 'user_id'=>$request->user_id
        ]);
        $request->session()->flash('message', 'Device Successfully added');
        return redirect(route('devices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show(Devices $devices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit(Devices $device)
    {
        return view('devices.create')->with('device', $device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devices $device)
    {
        $device->name = $request->name;
        $device->date = $request->date;
        $device->save();
        $request->session()->flash('message', 'Device Edited Successfully');
        return redirect(route('devices.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devices $device)
    {
        $device->delete();
        return redirect(route('devices.index'));
        $device->delete();
    }
    public function return_date(Request $request, Devices $id)
    {
        // $data=Device::all();
        return view('devices.reqMan')->with('devices', $id);
    }
    public function Requpdate(Request $request, Devices $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'return_date' => 'required',
        ]);
        $id->name = $request->name;
        $id->date = $request->date;
        $id->return_date = $request->return_date;
        $id->save();
        $request->session()->flash('message', 'Return Date Successfull');
        return redirect(route('devices.index'));
    }
}
