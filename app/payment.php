<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'payment';
    protected $fillable = ['id','user_id','bank_id','payment_shot','amount','status'];
}
