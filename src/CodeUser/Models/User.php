<?php

namespace CodePress\CodeUser\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Validation\Validator;

class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'codepress_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'codepress_user_roles', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        return is_string($role) ?
                $this->roles->contains('name', $role) : $role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    private $validator;

    function getValidator()
    {
        return $this->validator;
    }

    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function isValid()
    {
        $validator = $this->validator;
        $validator->setRules([
            'name' => 'required|max:255',
            'email' => 'required|unique',
            'password' => 'required|min:6'
        ]);
        $validator->setData($this->attributes);

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }

}
