<?php

namespace App\Http\Livewire;

use App\Models\Reward;
use Livewire\Component;
use phpDocumentor\Reflection\Location;

class BuyArticleModal extends Component
{
    public $itemId;
    public $price;

    public $open = false;
    public $reward;


    protected $listeners = ['refreshShop'=>'refreshMe'];

    public function refreshMe($itemid, $itemprice){
        $this->itemId = $itemid;
        $this->price = $itemprice;
    }

    public function buyArticle($itemid,$itemprice){
        $user = auth()->user();
        $user->rewards()->create(['reward_type_id' => $itemid]);
        $user->buystuff($itemprice);
        $user->save();
        $this->open = true;
//        Reward::Refresh();

    }

    public function render()
    {
        return view('livewire.buy-article-modal');
    }
}
