<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article() {
        return $this->belongsTo('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
