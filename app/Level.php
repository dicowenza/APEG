<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function book_reference() {
        return $this->belongsTo('App\BookReference');
    }
}
