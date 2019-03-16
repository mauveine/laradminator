<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'bio', 'role', 'cnp', 'mobile_phone', 'capital_parts', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules ($update = false, $id = null) {
        $commun = [
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|confirmed',
            'avatar' => 'image',
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'cnp' => 'required|min:13|max:13|unique:users'
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function setPasswordAttribute ($value = '') {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute ($value) {
        if (!$value) {
            return 'http://placehold.it/160x160';
        }

        return config('variables.avatar.public') . $value;
    }

    public function setAvatarAttribute ($photo) {
        $this->attributes['avatar'] = move_file($photo, 'avatar');
    }

    public function addresses () {
        return $this->hasMany('App\Models\User\Address', 'user_id', 'id');
    }

    public function mainAddress () {
        return $this->hasOne('App\Models\User\Address', 'user_id', 'id')->where('is_default', true);
    }

    /*
    |------------------------------------------------------------------------------------
    | Boot
    |------------------------------------------------------------------------------------
    */
    public static function boot () {
        parent::boot();
        static::updating(function ($user) {
            $original = $user->getOriginal();

            if (\Hash::check('', $user->password)) {
                $user->attributes['password'] = $original['password'];
            }
        });
    }
}
