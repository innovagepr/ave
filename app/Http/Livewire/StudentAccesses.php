<?php

namespace App\Http\Livewire;

use App\Models\LoginRecord;
use Livewire\Component;
use Livewire\WithPagination;

class StudentAccesses extends Component
{
    use WithPagination;
    public $selectedStudent;
    public $accessHeader = array("Tipo", "Fecha");
    public function render()
    {
        return view('livewire.student-accesses', ['accesses' => LoginRecord::where('user_id', '=', $this->selectedStudent)->paginate(5)]);
    }

}
