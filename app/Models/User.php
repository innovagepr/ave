<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'dob',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'dob',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function pet(){
        return $this->hasOne(Pet::class,);
    }

    public function rewards(){
        return $this->hasMany(Reward::class);
    }


    public function loginRecords(){
        return $this->hasMany(LoginRecord::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function lists(){
        return $this->hasMany(ListExercise::class);
    }

    public function answered_words(){
        return $this->hasMany(AnsweredWord::class);
    }

    public function ownedGroups(){
        return $this->hasMany(Group::class, 'owner_id');
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function buystuff($cost){
        $this->coins = $this->coins - $cost;
        $this->save();
    }


}

