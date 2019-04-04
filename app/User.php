<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Transaction;
use App\Models\AddFundsWallet;
use App\Models\Discount;
class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function refferral()
    {
        return $this->belongsTo(User::class,'referral_id','id');
    }

    public function referralMember()
    {
        return $this->hasMany(User::class,'referral_id','id');
    }

     public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id','id');
    }

    public function fundingHistory()
    {
        return $this->hasMany(AddFundsWallet::class,'user_id','id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class,'user_id','id');
    }

    public function placementUser()
    {
        return $this->belongsTo(User::class,'placement_id','id');
    }
}
