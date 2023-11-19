<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    
    private $data;

    public function __construct($data)
    {
        $this->users = $data;
    }

    public function view(): View
    {
        return view("admin.export.customer",$this->users);
    }


}
