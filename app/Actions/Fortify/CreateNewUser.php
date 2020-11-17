<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public $test;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:128'],
            'last_name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();
        if($input['role_id'] == 1)
        {
            if(Role::find(1) == null)
            {
                $role = new Role;
                $role->id = 1;
                $role->name = 'Profesional';
                $role->slug = 'professional';
                $role->save();
            }
        }
        else
        {
            if(Role::find(2) == null)
            {
                $role = new Role;
                $role->id = 2;
                $role->name = 'Estudiante';
                $role->slug = 'child';
                $role->save();
            }
        }

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'role_id' => $input['role_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'dob'=> $input['dob'],
        ]);
    }
}
