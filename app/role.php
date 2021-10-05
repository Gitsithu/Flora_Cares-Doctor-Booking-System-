<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'role';
    protected $fillable = ['id','name','status'];
}
