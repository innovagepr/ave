<?php

namespace App\Http\Livewire;

use App\Models\PetType;
use App\Models\RewardType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectPetModal extends Component
{
    public $petId;

    public $name;
    private $avatar;

    protected $rules = [
        'name' => 'required|max:128',
    ];

    protected $listeners = ['refreshShop'=>'refreshMe'];

    /**
     * Refresh the child component with the data variables in parameters
     * @param $petId
     */
    public function refreshMe($petId){
        $this->petId = $petId;
    }

    /**
     * RENDER
     * Renders the modal view with data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $data['petUser'] = Auth::user();
        $data['petType'] = PetType::all();
        return view('livewire.select-pet-modal', compact('data'));
    }

    /**
     * CONFIRM PET
     * Function to select and confirm the selection of the pet. Also, generates the avatar image.
     * @param PetType $petType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmPet(PetType $petType){
        $this->validate();
        $user = auth()->user();

        $user->pet()->create([
            'pet_type_id' => $petType->id,
            'name'=>$this->name
        ]);
        $user->save();

        //Generate Avatar base Image
        $this->avatar = new PetAvatar;
        if($petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }
        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
        //Redirect the user's dashboard screen
        return redirect('/dashboard');
    }
}
