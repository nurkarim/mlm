<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Transaction;
use App\Models\AddFundsWallet;
use App\Models\Withdrawal;
use App\Models\Discount;
use Hexters\CoinPayment\Entities\CoinPaymentuserRelation;
use App\Models\ReferralCommission;

class User extends Authenticatable
{
    use Notifiable,CoinPaymentuserRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_name',
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

    public function refferralCount()
    {
        return $this->hasMany(User::class,'referral_id','id');
    }

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

    public function placementCount()
    {
        return $this->hasMany(User::class,'placement_id','id');
    }

    public function referralUser()
    {
        return $this->hasMany(User::class,'referral_id','id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class,'user_id','id');
    }

    public function commissions()
    {
        return $this->hasMany(ReferralCommission::class,'user_id','id');
    }
}
