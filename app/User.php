<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function saved_listings() {
        return $this->belongsToMany('\App\Listing', 'saved')
            ->withTimestamps();
    }

    public function save_listing(Listing $listing)
    {
        $this->saved_listings()->attach($listing);
    }

    public function unsave_listing(Listing $listing)
    {
        $this->saved_listings()->detach($listing);
    }
}
