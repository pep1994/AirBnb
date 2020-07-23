<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  // collegamento alla tabella photos
    protected $table = 'photos';

  // collegamento molti a uno con tabella apartment 
    public function apartment() {
      return $this->belongsTo(Apartment::class);
    }
}
