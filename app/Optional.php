<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
  // collegamento alla tabella optionals
  protected $table = 'optionals';

  // collegamento molti a molti con la tabella apartment
  public function apartments(){
    return $this -> belongsToMany(Apartment::class);

  }
}
