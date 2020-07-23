<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    // collegamento alla tabella views
    protected $table = 'views';

    // collegamento molti a uno con tabella apartment
    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }
}
