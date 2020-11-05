<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    protected $table = 'permissins';
    protected $guarded = [];

    public function parentPer(){
        return $this->belongsTo('App\Permission', 'parent_id', 'id');
    }

    public function PermissionChildren(){
        return $this->hasMany('App\Permission', 'parent_id', 'id');
    }
}
