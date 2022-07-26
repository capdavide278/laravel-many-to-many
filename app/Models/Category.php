<?php

namespace App\Models;

use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Slugger;

    public $timestamps = false;

    public function post() {
        return $this->hasMany('App\Models\Post');
    }
}
