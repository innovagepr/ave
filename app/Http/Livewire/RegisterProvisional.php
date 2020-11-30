<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;

class RegisterProvisional extends Component
{
    use PasswordValidationRules;
    public $provisionalAcc;
    public $provisionalUsername;
    public $provisionalPassword;
    public $email;
    public $password;
    public $password_confirmation;
    public $userValid = 0;
    public $topActive = 1;

    public function checkUser(){
        $this->validate(['provisionalUsername' => 'required|exists:users,email', 'provisionalPassword' =>'required'],
            [
                'provisionalUsername.required' => 'Favor proveer un nombre de usuario',
                'provisionalUsername.exists' => 'Usuario no existe en el sistema',
                'provisionalPassword.required' => 'Contraseña inválida',
            ],
            ['email' => 'Nombre de Usuario', 'password' => 'Contraseña']);
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
        $this->validate(['email' => 'required|email|unique:users|max:255|string', 'password' =>$this->passwordRules(), 'password_confirmation' => 'required'],
            [
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico',
                'email.unique' => 'Usuario ya existe en el sistema',
                'email.max' => 'Correo electrónico no debe exceder 255 caracteres.',
                'email.max' => 'Correo electrónico debe contener texto.',
            ],
            ['email' => 'Nombre de Usuario']);
        $this->provisionalAcc->email = $this->email;
        $this->provisionalAcc->password = Hash::make($this->password);
        $this->provisionalAcc->save();
        return redirect()->to('/dashboard');
    }

}
