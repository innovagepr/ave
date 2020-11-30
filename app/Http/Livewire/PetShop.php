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

    /**
     * Render
     * Renders the view of the pet rewards screen
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $data['pet'] = Auth::user()->pet;
        $data['rewards'] = RewardType::all();
        return view('livewire.pet-shop', compact('data'));
    }

    /**
     * Buy Article Modal
     * Dispatch event to execute a confirmation modal at the moment that the user decides to purchase a reward in the Rewards Store
     * The modal shows the price of the item.
     * @param $itemid
     * @param $itemprice
     */
    public function buyArticleModal($itemid, $itemprice){
        $this->emit('refreshShop', $itemid, $itemprice);
        $this->dispatchBrowserEvent('buyArticle');
    }
}
