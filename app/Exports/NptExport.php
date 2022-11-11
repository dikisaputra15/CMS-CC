<?php

namespace App\Exports;

use App\Models\Service;
use App\Models\Client;
use App\Models\Archive_service;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NptExport implements FromCollection,WithHeadings
{
    
    public function headings():array{
        return[
            'Contract No',
            'Nama Services',
            'Start Date',
            'End Date',
            'Contract Value' 
        ];
    } 

    public function collection()
    {
        $view = DB::table('archive_services')
        ->join('clients', 'archive_services.id_client', '=', 'clients.id')
        ->join('services', 'archive_services.id_service', '=', 'services.id')
        ->select('clients.contract_no','services.nama_services','archive_services.start_date','archive_services.end_date','clients.contract_value')
        ->get();

        return $view;
    }
}
