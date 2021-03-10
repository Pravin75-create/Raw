<?php

namespace App\Exports;
use App\Invoice;
use App\Models\Devices;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Contracts\View\View;


class DevicesExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('devices.excel')->with('devices',Devices::all());
    }
}
