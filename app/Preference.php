<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';

    public function apartment() {
      return $this -> belongsTo(Apartment::class);
    }
}
