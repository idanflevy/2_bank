<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'customer_id', 'account_number', 'customer_category',
        'title', 'middle_name', 'firstname', 'lastname', 'dob', 'idcard', 'country', 'city', 'mobile', 'street', 'country',
        'preferred_name', 'preferred_city', 'status', 'transfer_count', 'transfer_status'

        // 'firstname', 'lastname', 'email', 'password', 'type', 'portal'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email)) . '.jpg?s=200&d=mm';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assigning User role
     *
     * @param \App\Models\Role $role
     */
    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'Admin')->exists();
    }

    public function isUser()
    {
        return $this->roles()->where('name', 'User')->exists();
    }


    public function deposits()
    {
        return $this->hasMany('App\Models\Deposits');
    }

    public function depositones()
    {
        return $this->hasMany('App\Models\Depositones');
    }
    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }
    public function transfers()
    {
        return $this->hasMany('App\Models\Transfer');
    }
}