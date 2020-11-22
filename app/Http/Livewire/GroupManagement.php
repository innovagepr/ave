<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Group;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

/**
 * Livewire Component for Group Management
 * Class GroupManagement
 * @package App\Http\Livewire
 */
class GroupManagement extends Component
{
    use WithPagination;
    protected $rules = [
        'name' => 'required|max:128',
        'description' => 'required'
    ];
    protected $messages = [
        'name.required' => 'Favor proveer un nombre.',
        'name.max' => 'El nombre del grupo no puede exceder 128 caracteres.',
        'description.required' => 'Favor proveer una descripción.',
    ];
    public $tempDate;
    public $name;
    public $something;
    public $debug;
    public $tableActive;
    public $firstName;
    public $lastName;
    public $dob;
    public $age;
    public $nameToEdit;
    public $descToEdit;
    public $groupID = 1;
    public $selectedGroup;
    public $description;
    public $groupStudents;
    public $selectedGroupName;
    public $creationdate;
    public $groupToRemove;
    public $studentToRemove;
    public $members;
    public $email;
    public $studentID = 7;
    public $active = true;
    public $headersGroups = array("Nombre", "Fecha de creación", "Cantidad de miembros", "Eliminar");
    public $students;

    /**
     * Renders the view associated with the component.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.group-management', ['groups' => Group::where('owner_id', '=', auth()->user()->id)
                                                                        ->where('active', '=', 1)->paginate(3, ['*'], 'groups')]);
    }

    public function mount(){
        $this->tempDate = today();
    }

    /**
     * Dynamically validates a property.
     * @param $propertyName the property to be validated
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Resets all editable fields upon closing a modal.
     */
    public function resetOnClose()
    {
        $this->name="";
        $this->active=true;
        $this->firstName="";
        $this->lastName="";
        $this->age="";
        $this->description="";
        $this->email="";
        $this->nameToEdit="";
        $this->descToEdit="";
        $this->studentToRemove= "";
        $this->groupToRemove= "";
        $this->groups = Group::where('owner_id', '=', auth()->user()->id)->get();
        if($this->tableActive)
        {
            $this->selectedGroup = Group::find($this->selectedGroup->id);
        }
    }

    /**
     * Sends a browser event to create a new group.
     */
    public function newModal(){
        $this->dispatchBrowserEvent('newModal');
    }
    /**
     * Sends a browser event to edit a group.
     */
    public function editModal(){
        $this->nameToEdit = $this->selectedGroup->name;
        $this->descToEdit = $this->selectedGroup->description;
        $this->dispatchBrowserEvent('editModal');
    }

    /**
     * Sets the group depending on the clicked area of the view.
     * @param $groupNumber the group that has been selected.
     */
    public function clickGroup($groupNumber)
    {
        if($this->tableActive === 1 && $this->selectedGroup->id === $groupNumber)
        {
            $this->tableActive = 0;
            $this->groupStudents = null;
            $this->selectedGroup = null;
        }
        else
        {
            $this->selectedGroup = Group::find($groupNumber);
            $this->tableActive = 1;
        }
    }

    /**
     * Adds a new group.
     */
    public function submitGroup()
    {
        $this->validate();
        $createdGroup = new Group;
        $createdGroup->owner_id = auth()->user()->id;
        $createdGroup->list_exercise_id = null;
        $createdGroup->name = $this->name;
        $createdGroup->description = $this->description;
        $createdGroup->date_created = today();
        $createdGroup->active = 1;
        $createdGroup->save();
        $this->dispatchBrowserEvent('group-added');
        $this->resetOnClose();
    }

    /**
     * Edits a group's name and description.
     */
    public function editGroup()
    {
        $this->validate(['nameToEdit' => 'required|max:128',
                             'descToEdit' => 'required'],
            [
                'nameToEdit.required' => 'Favor proveer un nombre.',
                'nameToEdit.max' => 'El nombre del grupo no puede exceder 128 caracteres.',
                'descToEdit.required' => 'Favor proveer una descripción.',
            ],
            ['nameToEdit' => 'Name to Edit',
                'descToEdit' => 'Description to Edit']);
        $this->selectedGroup->name = $this->nameToEdit;
        $this->selectedGroup->description = $this->descToEdit;
        $this->selectedGroup->save();
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }

    public function removeGroupModal($selectedGroup){
        $this->groupToRemove = Group::find($selectedGroup);
        $this->dispatchBrowserEvent('removeGroupModal');
    }

    /**
     * Removes a group depending on which area of the view it has been called.
     * @param $selectedGroup the group delete button that was selected.
     */
    public function removeGroup(){
        if($this->groupToRemove->id === $this->selectedGroup->id){
            $this->tableActive = 0;
        }
        $this->groupToRemove->active = 0;
        $this->groupToRemove->save();
        $this->resetOnClose();
        $this->dispatchBrowserEvent('group-removed');
    }


    public function removeStudentModal($selectedStudent){
        $this->studentToRemove = User::find($selectedStudent);
        $this->dispatchBrowserEvent('removeStudentModal');
    }
    /**
     * Removes a student depending on which area of the view it has been called.
     * @param $selectedStudent the student delete button that was selected.
     */
    public function removeStudent(){
        $this->selectedGroup->members()->detach($this->studentToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('student-removed');
    }


}
