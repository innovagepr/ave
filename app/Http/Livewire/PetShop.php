<?php

namespace App\Http\Livewire;

use App\Models\RewardType;
use App\Models\Reward;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PetShop extends Component
{
    public $pet;
    public $user;
    public $rewards;
    public $userRewards;

    public function render()
    {
        $data['pet'] = Auth::user()->pet;
        $data['rewards'] = RewardType::all();
        return view('livewire.pet-shop', compact('data'));
    }

    public function buyArticleModal($itemid, $itemprice){
        $this->emit('refreshShop', $itemid, $itemprice);
        $this->dispatchBrowserEvent('buyArticle');
    }
}
