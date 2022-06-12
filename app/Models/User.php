<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_email_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    // public function plant()
    // {
    //     return $this->hasMany(Plant::class);
    // }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function costumer()
    {
        return $this->hasMany(Costumer::class);
    }

    public function gapoktan()
    {
        return $this->hasMany(Gapoktan::class);
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function poktan()
    {
        return $this->hasMany(Poktan::class);
    }

    public function farmer()
    {
        return $this->hasMany(Farmer::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function notificationUser()
    {
        return $this->hasMany(NotificationUser::class);
    }
}
