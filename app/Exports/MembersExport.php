<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Members;

class MembersExport implements FromCollection, WithHeadings{

    public function collection(){
      return Members::all();
    }

    public function headings(): array{
      return[
        'No.',
        'Member Code',
        'English Name',	
        'Chinese Name',
        'Gender',
        'Age Group',
        'Contact No.',	
        'Email',	
        'Joining Date',		
        'Consent',
        'SMS/Email',	
        'Remarks',
        'Created date',
        'Updated date'
      ];
    } 

}