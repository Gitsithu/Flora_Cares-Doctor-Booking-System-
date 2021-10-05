<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'specialization';
    protected $fillable = ['id','name','status'];
}
