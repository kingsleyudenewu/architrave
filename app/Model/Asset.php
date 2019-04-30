<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['name'];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
