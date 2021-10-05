<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'appointment';
    protected $fillable = ['id','user_id','user_doctor_id','clinic_id','date','time','status'];
}
