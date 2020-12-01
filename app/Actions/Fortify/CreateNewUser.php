<?php

namespace App\Actions\Fortify;

use App\Models\LoginRecord;
use App\Models\Pet;
use App\Models\PetType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;
use App\Rules\AgeProfessional;
use App\Rules\AgeChild;

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

        if($input['role_id'] == 1)
        {
            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:128'],
                'last_name' => ['required', 'string', 'max:128'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'dob' => ['required', new AgeProfessional()],
                'contraseña' => $this->passwordRules(),
            ])->validate();
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
            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:128'],
                'last_name' => ['required', 'string', 'max:128'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'dob' => ['required', new AgeChild()],
                'contraseña' => $this->passwordRules(),
            ])->validate();
            if(Role::find(2) == null)
            {
                $role = new Role;
                $role->id = 2;
                $role->name = 'Estudiante';
                $role->slug = 'child';
                $role->save();
            }
        }

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'role_id' => $input['role_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['contraseña']),
            'dob'=> $input['dob'],
            'deleted' => 0,
        ]);
        $loginRecord = new LoginRecord();
        $loginRecord->user_id = $user->id;
        $loginRecord->type = 'login';
        $loginRecord->date = now();
        $loginRecord->created_at = now();
        $loginRecord->updated_at = now();
        $loginRecord->save();
        return $user;
    }
}
