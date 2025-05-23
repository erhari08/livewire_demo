<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Employee;

class EmployeeTable extends DataTableComponent
{
    protected $model = Employee::class;
    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
        ];
    }
     
    public function export()
    {
        $users = $this->getSelected();
     
        $this->clearSelected();
     
        return Excel::download(new EmployeeExport($users), 'Employeee.xlsx');
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Gender", "gender")
                ->sortable(),
            Column::make("Phone no", "phone_no")
                ->sortable(),
            Column::make("Country", "country")
                ->sortable(),
            Column::make("State", "state")
                ->sortable(),
            Column::make("City", "city")
                ->sortable(),
            Column::make("Zip", "zip")
                ->sortable(), 
                              
            Column::make("Photo", "photo")
                ->sortable(),
            Column::make("Additonal doc", "additonal_doc")
                ->sortable(),
             LinkColumn::make('Action')
            ->title(fn($row) => 'Edit')
            ->location(fn($row) => route('user_creation')),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
