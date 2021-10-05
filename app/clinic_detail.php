<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class clinic_detail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'clinic_detail';
    protected $fillable = ['id','user_doctor_id','clinic_id','from_time','to_time','day','status'];
}
