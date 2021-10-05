<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','description','status','role_id','nrc',
        'specialization_id','image','degree'
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

//     public static function boot() 
//     { parent::boot(); 
//         self::creating(function ($model) 
//         { $model->id = (string) Uuid::generate(4); }); 
//     } 
    
//     public function getRouteKeyName() { return 'id'; }
// 
}
