<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class clinic extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'clinic';
    protected $fillable = ['id','name','address','status'];
}
