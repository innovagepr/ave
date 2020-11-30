<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Group;
use Khill\Lavacharts\Lavacharts;

class GroupStatistics extends Component
{
    use WithPagination;
    public $selectedStudent;
    public $selectedGroup;
    public $group;
    public $headersStudents = array("Nombre", "Accesos");
    public $chartActive = 1;
    public function render()
    {
        return view('livewire.group-statistics', ['students' => Group::find($this->selectedGroup)->members()->paginate(3)] );
    }

    public function mount(){
        $this->group = Group::find($this->selectedGroup);
        $this->genChart();
    }
    public function updated(){
        return view('livewire.group-statistics', ['students' => Group::find($this->selectedGroup)->members()->paginate(3)] );
    }
    public function  resetOnClose(){
        $this->selectedStudent = null;
        $this->genChart();
        $this->chartActive = 1;
    }

    public function studentAccessModal($selectedStudent){
        $this->chartActive = 0;
        $this->selectedStudent = $selectedStudent;
        $this->dispatchBrowserEvent('studentAccessModal');
    }
    public function genChart(){
        $stocksTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel
        $stocksTable->addDateColumn('Mes')
            ->addNumberColumn('Accesos');

        for($i =1; $i <=12; $i++){
            $record = Group::find($this->selectedGroup)->members()->join('login_records', 'group_users.user_id', '=',
                'login_records.user_id')->whereMonth('date', '=', $i)->get();
            $stocksTable->addRow(['2020-' .$i , count($record)]);
        }
        \Lava::LineChart('MyStocks', $stocksTable);
    }

}
