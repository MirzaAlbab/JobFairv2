<?php

namespace App\Exports;

use App\Models\JobApplication;
use App\Models\Major;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class JobApplicationExport implements  FromCollection, WithHeadings, WithTitle, WithMapping
{
    
    public function collection()
    {
        return JobApplication::all();
    }

    // how to get major name from major id
    public function getMajor($id){
        $major = Major::where('id','=',$id)->first();
        return $major?->name;
        
    }

    public function map($row): array
    {
        return [
            $row->user->name,
            $row->user->email,
            $row->user->phone,
            $row->user->about,
            $row->user->education,
            $this->getMajor($row->user->major),
            $row->user->city,
            $row->user->address,
            $row->user->instagram,
            $row->user->linkedin,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'About',
            'Education',
            'Major',
            'City',
            'Address',
            'Instagram',
            'Linkedin',
        ];
    }
    // give title to exported file
    public function title(): string
    {
        return 'Job Application '.auth()->user()->name;
    }
    

}
