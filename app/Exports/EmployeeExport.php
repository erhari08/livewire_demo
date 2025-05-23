<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EmployeeExport implements WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath("https://media.istockphoto.com/id/1217500298/vector/light-bulb-in-various-creative-watercolors-modern-design-idea-concept-vector.jpg?s=1024x1024&w=is&k=20&c=ntyB8ackr01bABlcC5wnTyi4PqMr16cLrVZ8jqYJpdw=");
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

}
