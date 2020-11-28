<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterProvisional extends Component
{
    public $provisionalAcc;
    public $provisionalUsername;
    public $provisionalPassword;
    public $email;
    public $password;
    public $userValid = 0;
    public $topActive = 1;

    public function checkUser(){
        $foundUser = User::where('email', '=', $this->provisionalUsername)->first();
        $pw = $foundUser->password;
        if($foundUser && Hash::check($this->provisionalPassword, $pw)){
            $this->provisionalAcc = $foundUser;
            $this->topActive = 0;
            $this->userValid = 1;
        }
    }
    public function render()
    {
        return view('livewire.register-provisional');
    }
    public function registerProvisional()
    {
        $this->provisionalAcc->email = $this->email;
        $this->provisionalAcc->password = Hash::make($this->password);
        $this->provisionalAcc->save();
        return redirect()->to('/dashboard');
    }

}
