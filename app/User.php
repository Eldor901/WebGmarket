<?php
// runs market model market model
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function  city()
    {
        return $this->belongsTo('App\City', 'id_city', 'id_city');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_user', 'market_id', 'product_id')->withTimestamps();
    }


    protected $primaryKey = 'id_market';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_market', 'email', 'password', 'description_market', 'number_market', 'id_city',
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

    public function getId()
    {
        return $this->id_market;
    }
}
