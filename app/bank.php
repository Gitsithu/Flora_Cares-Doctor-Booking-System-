<?php

namespace App;
use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'bank';
    protected $fillable = ['id','name','user_name','number','status'];
}
